<?php


namespace BladeBTC\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "Start Command to get you started";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {

        //Keyboard
        $keyboard = [
            ["REVENUE \xF0\x9F\x93\x88"],
            ["COMMUNITY \xF0\x9F\x8C\x8F"],
            ["SUPPORT \xF0\x9F\x92\xAC"],
        ];
        $telegram = new Api('384533803:AAE1pyxwEVQVZ_ayHc3glmoWZ4_GwtJCZK4');
        $reply_markup = $telegram->replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);

        // This will update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        //Welcome message.
        $this->replyWithMessage([
            'text' => "Nice to see you <b>" . $this->getUpdate()->getMessage()->getFrom()->getFirstName() . "</b>\nTo explore me use controls below.",
            'reply_markup' => $reply_markup,
            'parse_mode' => 'HTML'
        ]);
    }
}