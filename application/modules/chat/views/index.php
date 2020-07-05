<div class="row no-gutters align-items-center p-2 border-bottom">
  <div class="col-1">
    <a href="javascript:void(0)" class="card-link text-dark backToHome"><i class="fas fa-arrow-left"></i>
    </a>
  </div>
  <div class="col-7 d-flex align-items-center">
    <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/').$user_receiver->image?>" alt="">
    <h5 class="text-primary ml-2"><?=$user_receiver->fullname; ?></h5>
  </div>
  <div class="col-4 text-right">
    <button class="btn btn-sm btn-primary" id="allChatWith">Semua</button>
    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a>
    <?php if($this->session->userdata('role_id') != 3) : ?>
    <?php endif; ?>
  </div>
</div>

<div class="row no-gutters justify-content-end p-2">
  <div class="col-6 col-md-4">
  <input type="date" class="form-control form-control-sm bg-primary text-white" value="<?=date('Y-m-d');?>" id="filterDate">
  </div>
</div>
<!-- ini box chat -->
<div class="box-chat"></div>
<!-- ini box chat -->

<form action="<?=base_url('chat/chat_with/'); ?>" id="form_chat">
  <div class="form-group row no-gutters border-top">
    <div class="col-10 col-md-11">
      <input type="hidden" name="chat_root_id" id="chat_root_id" value="<?=$chat_root; ?>">
      <textarea name="chat_text" id="chat_text" class="form-control border-0" rows="5" autofocus></textarea>
    </div>
    <div class="col-2 col-md-1 d-flex text-center align-items-center">
      <button class="btn btn-primary rounded-0"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>
</form>

<input type="hidden" id="key_user" value="<?=$this->session->userdata('user_id'); ?>">
<input type="hidden" id="key_chat" value="<?=$user_receiver->id; ?>">
<?php $life_time = time() - (60 * 60 * 24 * 2); ?>
<input type="hidden" id="life_time" value="<?=$life_time;?>">


<script type="text/javascript">

$('.backToHome').on('click',function () {
  const keyChat = $('#key_chat').val();
  $.ajax({
    url: '<?=base_url('chat/reset_adm/')?>'+keyChat,
    success : function (res) {
      window.location.href = '<?=base_url('home/')?>'
    }
  })
})

function playsoundreply() {
  var audio = new Audio('<?=base_url('assets/audio/__send.mp3')?>');
  audio.volume = 0.1;
  audio.play();
}
  $('#form_chat').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: $('#form_chat').attr('action'),
      type: 'POST',
      data: $('#form_chat').serialize(),
      success:function (res) {
        $('#chat_text').val('');
        playsoundreply()
      }
    })
  })

  $('#allChatWith').on('click',function() {
    allChatWith();
    clearInterval(iv);
  })

  function allChatWith() {
    const chat_root_id = $('#chat_root_id').val();
    const keyUser = $('#key_user').val();
    $.ajax({
      url: '<?=base_url()?>chat/get_chat_by_root_chat_id/' + chat_root_id,
      success: function (res) {
        let html = '';
        if (res) {
          const data = JSON.parse(res);
          data.forEach(d => {
            html += `
              ${(() => {
                if(d.user_id == keyUser){
                  return `
                    <div class="list-comment-commentator row no-gutters justify-content-end py-2">
                      <div class="col-10 col-lg-8 comment-other px-3">
                        <span class="d-block">${d.chat_text}</span>
                        <small class="fullname d-block">saya</small>
                        <small class="time d-block">${new Date(d.time_created*1000).toLocaleString()}</small>
                      </div>
                    </div>
                  `;
                }else{
                  return `
                    <div class="row no-gutters justify-content-start list-comment-reporter py-2">
                      <div class="col-10 col-lg-8 comment-self px-3">
                        <span class="d-block">${d.chat_text}</span>
                        <small class="time d-block mt-2">${new Date(d.time_created*1000).toLocaleString()}</small>
                      </div>
                    </div>
                  `;
                }
              })()}
            `;
          });  
          $('.box-chat').html(html);
        }
      }
    })
  }

  function get_chat() {
    const chat_root_id = $('#chat_root_id').val();
    const keyUser = $('#key_user').val();
    $.ajax({
      url: '<?=base_url()?>chat/get_chat_by_root_chat_id/' + chat_root_id,
      success: function (res) {
        let html = '';
        if (res) {
          const data = JSON.parse(res);
          data.forEach(d => {
            if(d.time_created > $('#life_time').val()){
              html += `
                ${(() => {
                  if(d.user_id == keyUser){
                    return `
                      <div class="list-comment-commentator row no-gutters justify-content-end py-2">
                        <div class="col-10 col-lg-8 comment-other px-3">
                          <span class="d-block">${d.chat_text}</span>
                          <small class="fullname d-block">saya</small>
                          <small class="time d-block">${new Date(d.time_created*1000).toLocaleString()}</small>
                        </div>
                      </div>
                    `;
                  }else{
                    return `
                      <div class="row no-gutters justify-content-start list-comment-reporter py-2">
                        <div class="col-10 col-lg-8 comment-self px-3">
                          <span class="d-block">${d.chat_text}</span>
                          <small class="time d-block mt-2">${new Date(d.time_created*1000).toLocaleString()}</small>
                        </div>
                      </div>
                    `;
                  }
                })()}
              `;
            }
          });  
          $('.box-chat').html(html);
        }
      }
    })
  }

  function filter_date() {
    $('.box-chat').html('');
    const keyUser = $('#key_user').val();
    const data = {
      'date' : $('#filterDate').val(),
      'root' : $('#chat_root_id').val()
    }
    $.ajax({
      url: '<?=base_url()?>chat/get_chat_by_filter_date/',
      type:'POST',
      data : data,
      success: function (res) {
        let html = '';
        if (res) {
          const data = JSON.parse(res);
          data.forEach(d => {
            html += `
              ${(() => {
                if(d.user_id == keyUser){
                  return `
                    <div class="list-comment-commentator row no-gutters justify-content-end py-2">
                      <div class="col-10 col-lg-8 comment-other px-3">
                        <span class="d-block">${d.chat_text}</span>
                        <small class="fullname d-block">saya</small>
                        <small class="time d-block">${new Date(d.time_created*1000).toLocaleString()}</small>
                      </div>
                    </div>
                  `;
                }else{
                  return `
                    <div class="row no-gutters justify-content-start list-comment-reporter py-2">
                      <div class="col-10 col-lg-8 comment-self px-3">
                        <span class="d-block">${d.chat_text}</span>
                        <small class="time d-block mt-2">${new Date(d.time_created*1000).toLocaleString()}</small>
                      </div>
                    </div>
                  `;
                }
              })()}
            `;
          });
          $('.box-chat').html(html);
        }
      }
    })
  }

  $('#filterDate').on('change',function () {
    clearInterval(iv);
    filter_date();
  })
  get_chat()
  let iv = setInterval(() => {
    get_chat()    
  }, 1000);
</script>