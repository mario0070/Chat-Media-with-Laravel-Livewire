<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public $sendTo;
    public $users;
    public $senderMsg;
    public $receiverMsg;
    public $notify;
    public $getAllMsg;

    public function render(User $user)
    {
        $this->users = $user::all()->except(Session()->get("userId"));

        $this->notify = Chat::latest()->get();
        $this->getAllMsg = Chat::orderBy("created_at")->get();
        return view('livewire.home');
    }


    // store msg in db
    public $msg;
    public function storeMsg(Chat $chat){
        $id = Session()->get("userId");
        $user = User::find($id);
        $recieverId = session()->get("recieverUsername");
        $senderUsername = $user->username;
        
        $chat->sent_from = $senderUsername;
        $chat->sent_to = $recieverId;
        $chat->message = $this->msg;
        if($this->msg != ""){
            $chat->save();
        }

        $this->msg = "";
    }


    // Get a single chat
    public $messages;
    public function getChat($id){
        $userChat = User::find($id);
        session()->put("recieverUsername",$userChat->username);
        
        $this->senderMsg = Chat::where("sent_from",session()->get("username"))->get();
        $this->receiverMsg = Chat::where("sent_to",session()->get("recieverUsername"))->get();
        $this->getAllMsg = Chat::all();
        $this->msg = "";
    }
}
