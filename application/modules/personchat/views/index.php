<div class="row no-gutters p-2 border-bottom align-items-center">
  <div class="col-1">
    <a href="<?=base_url('employee'); ?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
  <div class="col-9 d-flex align-items-center">
    <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/'.$employee->image) ?>" alt="">
    <h5 class="text-secondary ml-2"><?=$employee->fullname ?></h5>
  </div>
</div>


<!-- chat pertama -->
<?php if($get_firt_chat) : ?>
  <div class="row no-gutters justify-content-start mt-2">
    <div class="col-10 col-lg-8 comment-self px-3">
      <span class="d-block"><?=$get_firt_chat->first_chat_text ?></span>
      <small class="fullname"><?=$get_firt_chat->from ?></small>
      <small class="time d-block"><?= date('l d F Y',$get_firt_chat->time_created) ?></small>
      <input type="hidden" id="chat_id_for_replay" value="<?=$get_firt_chat->chat_id ?>">
    </div>
  </div>
<?php endif; ?>
<!-- chat pertama -->

<pre>
  <?php //print_r($get_firt_chat) ?>
</pre>

<div class="box-chat pt-2 px-1">
  <!-- <div class="row no-gutters justify-content-start list-comment-reporter" id="${d.comment_time}">
    <div class="col-10 col-lg-8 comment-self px-3">
      <span class="d-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt vel iusto et quae tempore, odio quam iure veniam expedita voluptatibus!</span>
      <small class="fullname">Nama</small>
      <small class="time d-block">tanggal</small>
    </div>
  </div>
  <div class="list-comment-commentator row no-gutters justify-content-end" id="1">
    <div class="col-10 col-lg-8 comment-other px-3">
      <span class="d-block">Lorem, ipsum.</span>
      <small class="fullname d-block">Nama</small>
      <small class="time d-block">tanggal</small>
    </div>
  </div> -->
</div>

<input type="hidden" name="user_id" id="user_id" value="<?=$employee->id ?>">
<input type="hidden" name="chat_id" id="user_id" value="<?=$employee->id ?>">

<?php if($get_firt_chat) : ?>
    <?= form_open('personchat/replay_to','id="form_replay_to"'); ?>
      <div class="box-write-comment row no-gutters border-top justify-content-between">
        <div class="col-lg-10 col-9">
          <textarea name="replay_chat_text" id="replay_chat_text" class="form-control border-0" placeholder="Balas..." rows="4" autofocus></textarea>
          <input type="hidden" name="phone_to" id="phone_to" value="<?=$employee->phone ?>">
          <input type="hidden" name="chat_id" id="chat_id" value="<?=$get_firt_chat->chat_id ?>">
        </div>
        <div class="col-lg-2 col-3 text-right">
          <button class="btn btn-primary rounded-0 mt-3"><i class="fas fa-paper-plane"></i></button>
        </div>
      </div>
    <?= form_close(); ?>
  <?php else : ?>
    <?= form_open('personchat/chat_to/','id="form_chat"'); ?>
      <div class="box-write-comment row no-gutters border-top justify-content-between">
        <div class="col-lg-10 col-9">
          <textarea name="chat_text" id="chat_text" class="form-control border-0" placeholder="Pesan..." rows="4" autofocus></textarea>
          <input type="hidden" name="phone_to" id="phone_to" value="<?=$employee->phone ?>">
        </div>
        <div class="col-lg-2 col-3 text-right">
          <button class="btn btn-primary rounded-0 mt-3"><i class="fas fa-paper-plane"></i></button>
        </div>
      </div>
    <?= form_close(); ?>
<?php endif; ?>

<script class="text/javascript">
$('#form_chat').on('submit',function (e) {
  e.preventDefault();
  $.ajax({
    url:$('#form_chat').attr('action'),
    type:'POST',
    data:$('#form_chat').serialize(),
    success:function (res){
      if(res){
        $('#chat_text').val('');
        window.location.href = '<?=base_url()?>personchat/index/'+$('#phone_to').val();
      }
    }
  })
})

// replay chat
$('#form_replay_to').on('submit',function (e) {
  e.preventDefault();
  $.ajax({
    url: $('#form_replay_to').attr('action'),
    type:'POST',
    data: $('#form_replay_to').serialize(),
    success:function (res) {
      if(res){
        $('#replay_chat_text').val('');
      }
    }
  })
})

// get reply
function get_replay() {
  const chat_id = $('#chat_id_for_replay').val();
  $.ajax({
    url: '<?=base_url()?>personchat/get_replay/'+chat_id,
    success: function (res) {
      html = ``;
      if(res){
        const data = JSON.parse(res);
        console.log(data);
        data.forEach(d => {
          html += `
          <div class="row no-gutters justify-content-start list-comment-reporter" id="${d.comment_time}">
            <div class="col-10 col-lg-8 comment-self px-3">
              <span class="d-block">${d.replay_chat_text}</span>
              <small class="time d-block">${new Date(d.time_created*1000).toLocaleString()}</small>
            </div>
          </div>
          `;
        });
        $('.box-chat').html(html);
      }
    }
  })
}
get_replay();
</script>
