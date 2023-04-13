<div id="popup" class="chat-popup">
                <div id="chat-content" class="chat-popup-content">
                    <div class="chat-area">
                        <header>
                            <a href="" class="back-icon"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                            
                            <img src="<?php echo URLROOT; ?>/img/profileImgs/<?php echo $data->profileimg ?>" alt="">
                            <div class="details">
                                <span><?php echo $data->Name;  ?></span>
                                <p><?php echo ( $data->active_status == "Active") ?  "Active": "Offline" ?></p>
                            </div>
                            
                        </header>
                        <div class="chat-box">
                            
                        </div>
                        <form action="" class="typing-area">
                            <input type="hidden" class="incoming_id" name="incoming_id" value="<?php echo $data->UserID ?>" >
                            <input type="hidden" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION['user_id']; ?>" >
                            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                            <button><i class="fab fa-telegram-plane"></i></button>
                        </form>
                    </div>
                </div>
</div>

<script src="<?php echo URLROOT;?>/js/components/chat/chat.js"></script>