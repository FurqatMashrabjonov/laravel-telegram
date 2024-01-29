<?php

namespace App\Telegram\Conversations;

use App\Repositories\FileRepository;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;

class FileConversation extends Conversation
{
    protected FileRepository $fileRepository;

    public function __construct()
    {
        $this->fileRepository = new FileRepository();
    }

    public function start(Nutgram $bot)
    {
        $bot->sendMessage('Please send me a file');
        $this->next('receiveFile');
    }

    public function receiveFile(Nutgram $bot)
    {
        $fileTypes = ['photo', 'document', 'audio', 'video', 'voice'];

        $fileType = 'message';

        foreach ($fileTypes as $type) {
            if (!is_null($bot->message()->$type)) {
                $fileType = $type;
                break;
            }
        }

        if ($fileType == 'message') {
            $bot->sendMessage('Please send me a file');
            $this->next('receiveFile');
            return;
        }

        $this->fileRepository->bot($bot)->store($fileType);

        $this->end();
    }
}
