<?php

namespace App\Repositories;

use App\Models\Audio;
use App\Models\Document;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Voice;
use App\Repositories\Interfaces\FileInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Media\File;
use SergiX44\Nutgram\Telegram\Types\Media\PhotoSize;

class FileRepository implements FileInterface
{


    protected Nutgram $bot;

    public function store(string $type): bool
    {
        $modelName = Str::ucfirst(Str::camel($type));

        if ($this->exists($this->getFileId($type), sprintf('App\Models\%s', $modelName))) {
            return false;
        }

        try {
            $method = __FUNCTION__ . $modelName;
            $this->$method();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }

        return true;
    }

    public function bot(Nutgram $bot): self
    {
        $this->bot = $bot;

        return $this;
    }

    protected function getFile(string $file_id): File
    {
        return $this->bot->getFile($file_id);
    }

    protected function storePhoto(): void
    {
        $this->storeToDB(array_merge(
            $this->getMaxSizePhoto()->toArray(),
            ['file_path' => $this->getFile($this->getMaxSizePhoto()->file_id)->url()]), Photo::class);
    }

    protected function storeVideo(): void
    {
        $this->storeToDB(array_merge(
            $this->bot->message()->video->toArray(),
            [
                'file_path' => $this->getFile($this->bot->message()->video->file_id)->url(),
                'thumbnail_file_path' => $this->getFile($this->bot->message()->video->thumbnail->file_id)->url()
            ]), Video::class);
    }

    protected function storeAudio(): void
    {
        $this->storeToDB(array_merge(
            $this->bot->message()->audio->toArray(),
            [
                'file_path' => $this->getFile($this->bot->message()->audio->file_id)->url(),
                'thumbnail_file_path' => $this->getFile($this->bot->message()->audio->thumbnail->file_id)->url()
            ]), Audio::class);
    }

    protected function storeDocument(): void
    {
        $this->storeToDB(array_merge(
            $this->bot->message()->document->toArray(),
            [
                'file_path' => $this->getFile($this->bot->message()->document->file_id)->url(),
                'thumbnail_file_path' => $this->getFile($this->bot->message()->document->thumbnail->file_id)->url()
            ]), Document::class);
    }

    protected function storeVoice(){
        $this->storeToDB(array_merge($this->bot->message()->voice->toArray(), []), Voice::class);
    }

    protected function exists(string $file_id, string $model): bool
    {
        return $model::where('file_id', $file_id)->exists();
    }

    protected function storeToDB(array $data, string $model): void
    {
        $model::create($data);
    }

    protected function getFileId(string $type): string
    {
        if ($type == 'photo') {
            return $this->getMaxSizePhoto()->file_id;
        }
        return $this->bot->message()->$type->file_id;
    }

    protected function getMaxSizePhoto(): PhotoSize
    {
        return collect($this->bot->message()->photo)->sortByDesc('file_size')->first();
    }
}
