<div>

    <div class="container">

        <div class="navigator">
            <div class="icons">
                <div class="first">
                    <a href=""><i class="fa-solid fa-comment"></i></a>
                    <i class="fa-solid fa-message" id="showUsers" ></i>
                    <a href=""><i class="fa-solid fa-user"></i></a>
                    <a href=""><i class="fa-solid fa-star"></i></a>
                </div>
                <div class="last">
                    <a href=""><i class="fa-solid fa-gear"></i></a>
                    <a href="{{route("logout")}}"><i class="fa-solid fa-power-off"></i></a>
                </div>
            </div>
        </div>

        <div class="users" id="users">
            <div class="header">
                <h2>Chats</h2>
                <div class="icons">
                    <h3><i class="fa-solid fa-users"></i></h3>
                </div>
            </div>

            <div class="search">
                <input type="search" placeholder="Search Chats....">
            </div><hr>

            <div class="chat">
                @foreach ($users as $user)
                    <div class="user" id="getChat" wire:click ="getChat({{$user->id}})">
                        <div class="img"><i class="fa-solid fa-user"></i></div>
                        <div class="userDetails">
                            <h4>{{$user->username}}</h4>
                            @foreach ($notify as $user )
                                <p id="notify">Demo Account <br><br></p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                
            </div>           
        </div>

        <div class="chatBox" id="chatBox">
            <div class="header">
                <div class="info">
                    <div class="img"><i class="fa-solid fa-user"></i></div>
                    <div>
                        <h4>{{session("recieverUsername")}}</h4>
                        <p>Messages are end-to-end encrypted</p>
                        <p wire:offline>Offline</p>
                    </div>
                </div>
                <div class="icons">
                    <i class="fa-solid fa-phone"></i>
                    <i class="fa-solid fa-video"></i>
                    <i class="fa-solid fa-circle-info"></i>
                </div>
            </div>


            {{-- messages --}}
            <div class="msg" id="msgContainer" wire:poll.1ms>
                <h3>Start Conversation</h3>
                @foreach ($getAllMsg as $users )

                    @if($users->sent_from === session("username") and $users->sent_to === session("recieverUsername"))
                        <div class="wrap2">
                            <div class="sentMsg">
                                <div class="myMsg">
                                    <p>{{$users->message}}</p>
                                    <div class="time">{{$users->created_at->format("H:i")}} AM</div>
                                </div>
                            </div>
                        </div>
                    @elseif($users->sent_from === session("recieverUsername") and $users->sent_to === session("username"))
                        <div class="wrap1">
                            <div>
                                <div class="msgBody">
                                    <p>{{$users->message}}</p>
                                    <div class="time">{{$users->created_at->format("H:i")}} AM</div>
                                </div> 
                            </div>
                        </div>
                    @endif 
                    
                @endforeach
            </div>



            {{-- send button --}}
            <div class="typeMsg">
                <div class="input">
                    <div>
                        <button id="sendMsg" wire:click="storeMsg" onclick="play()">Send Message</button>
                        <input type="text" wire:model ="msg" placeholder="Type Message........" id="msgInput">
                    </div>                    
                </div>
            </div>

        </div>
    </div>
</div>
