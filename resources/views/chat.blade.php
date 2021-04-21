@extends('layouts.web')

@section('content')

<header class="bg-dark text-white" style="background-image: url({{ asset('img/background/1.jpg') }}); padding: 110px 0 80px;">
    <div class="container ">
        <div class="row">
        <div class="col-12">
            <h1 class="hero-header text-center text-lg-left text-uppercase">Moot Chat</h1>
        </div>
        </div>
    </div>
</header>
<div class="container min-vh-80 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 mt-5">
            <div class="py-5  chat" >
                <h3 class="text-center">Proceed only if you comply with the following Safe from harm policy</h3>
                <p class="text-center my-4"><em>"I hereby declare that I will refrain from any activity which may affect the online safety of others such as cyber bullying, verbal, emotional and mental abuse, hate speech, and online grooming</em> </p>
                <p class="text-center my-4"><em>Moreover, I will refrain from disclosing my personal data such as personal information, email addresses, passwords, and credit card numbers to third parties which may threaten my safety online."</em> </p>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card bg-transparent">
                            <div class="card-header" id="chat-header">
                                Online Users <i class="fa fa-circle text-success"></i>
                            </div>
                            <div id="activeUsers" class="card-body overflow-auto text-left"  style=" max-height: 400px;">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header text-dark">Moot Chat | Language: English</div>
                            <div id="chatHistory" class="card-body overflow-auto  text-dark"  style=" height: 400px;">

                            </div>
                            <div class="card-footer bg-light">
                                <span class="text-dark form-text">Please use only ENGLISH language as this is an international chat room and immediate actions will be taken against misbehavers.</span>
                                <span class="text-dark form-text">Please be advised that you are solely responsible for the personal information and the contact details you share in the chatroom</span>
                                <span class="text-dark form-text">Stick to the Safe from harm Policies ( <a href="https://www.scout.org/safefromharm#:~:text=Safe%20from%20Harm%20is%20a,feel%20safe%2C%20at%20any%20time.">Safe From Harm - WOSM</a> ) and Enjoy!</span>
                                <span class="text-dark form-text"><small>Click on Send to send your message</small> </span>
                                <textarea class=" form-control" name="message" id="message" width=100%></textarea>
                                <span id="message-err" class="invalid-feedback text-center" role="alert"></span>
                                <button id="sendBtn" onclick="send_message()" class="btn btn-outline-primary"style="float: right; margin-right: 10px; margin-left: -25px; margin-top: -39px; position: relative; z-index: 2;">Send <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection

@section('script')


<script type="text/javascript">

    $(document).ready(function(){

        user_active = () => {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('moot.chat.active') }}",
                type: 'get', 
                success: function(data){
                    $('#chatHistory').html(data);
                },
                error: function(err){
                    SwalSystemErrorDanger.fire({
                        title: 'Connection Failed!',
                        text: 'Please Check your internet connection',
                    })
                }
            });

        }
        user_active();

        $('#message').emojioneArea({
            pickerPosition:"top",
            toneStyle:"bullet",
            saveEmojisAs: "image"
        });


        // $('#chatHistory').scrollTop($('#chatHistory')[0].scrollHeight);
        
        fetch_chat = () => {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('moot.chat.fetch') }}",
                type: 'get', 
                success: function(data){
                    $('#chatHistory').html(data);
                },
                error: function(err){
                    SwalSystemErrorDanger.fire({
                        title: 'Connection Failed!',
                        text: 'Please Check your internet connection',
                    })
                }
            });
        }

        fetch_users = () => {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('moot.user.fetch') }}",
                type: 'get', 
                success: function(data){
                    $('#activeUsers').html(data);
                },
                error: function(err){
                    SwalSystemErrorDanger.fire({
                        title: 'Connection Failed!',
                        text: 'Please Check your internet connection',
                    })
                }
            });
        }
    
        
        send_message = () => {
            var message = $('#message').val();
            $(".emojionearea-editor").html('');
            $('.invalid-feedback').html('');
            $('.invalid-feedback').hide();
            $('#message').val('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('moot.chat.send') }}",
                type: 'post', 
                data: {
                    'message': message
                },
                success: function(data){

                    if (data == 'bad words') {
                        SwalSystemErrorDanger.fire({
                            title: 'Avoid Such Words!',
                            text: 'If you continue to use such words, admins will be notified! and will be blocked without prior notice',
                        })
                    }
                    if(data['errors']){   
                        $.each(data['errors'], function(key, value){                     
                            $('#'+key+'-err').show();
                            $('#'+key+'-err').append(value);
                        });
                    }
                    else{
                        // alert ('done');
                        fetch_chat()
                        window.location.hash = '#chat-header';
                        
                    }
                    user_active()
                },
                error: function(err){
                    SwalSystemErrorDanger.fire({
                        title: 'Connection Failed!',
                        text: 'Please Check your internet connection',
                    })
                    user_active()
                }
            });
        }


        setInterval(function(){
            fetch_chat(); 
            fetch_users();
        }, 1000)

        // $(document).keyup(function (e) {
            
        //     //alert(code);
        //     if (e.which == 13) {
        //         $('#sendBtn').click();
        //         return false;
        //     }
        // });


    });
    // setInterval(function(){
    //     user_active();
    // }, 5000)
    window.onfocus = function(){user_active()};
</script>

@endsection