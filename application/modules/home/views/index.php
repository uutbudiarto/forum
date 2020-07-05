<?=$this->session->flashdata('message'); ?>
<div class="box-all-users p-2">
  <?php foreach($all_users as $user) : ?>
    <?php if($user->id != $this->session->userdata('user_id')) : ?>
    <div class="box-user" onclick='detail_emp(<?=$user->id?>)'>
        <img src="<?=base_url('assets/img/profile/').$user->image; ?>" alt="">
        <span><?=$user->fullname; ?></span>
    </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<div id="box_char_root">
<?php foreach ($chat_root as $cr) : ?>
  <div class="chat-by p-2" onclick='load_replay_chat(<?=$cr->chat_root_id?>)'>
    <div class="row no-gutters align-items-center">
      <div class="col-3 col-md-2">
        <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/').$cr->image?>" alt="">
      </div>
      <div class="col-6 col-md-7">
        <p><?=$cr->from ?></p>
        <small><?=$cr->position_name ?></small>
      </div>
      <div class="col-3 col-md-3 text-center">
        <small class="text-danger">
          <?php if($cr->count_chat_adm > 0) : ?>
            <?=$cr->count_chat_adm; ?> pesan belum dibaca
          <?php endif; ?>
        </small>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<div class="row no-gutters justify-content-end">
  <div class="col-6 text-right mr-2">
    <div class="list-group list-group-flush mt-3" id="getCFA">
      <?php if($get_chat_fa) : ?>
        <small><i class="fas fa-bell text-danger"></i></small>
        <?php foreach($get_chat_fa as $gcf) : ?>
      <a href="<?=base_url('chat/index/').$gcf->to_user;?>" class="list-group-item list-group-item-action p-1 d-flex justify-content-between align-items-center px-2 rounded-0">
        <small class="text-danger"><b><?=$gcf->count_chat_emp ?> balasan</b> dari <?=$gcf->replay_from_emp;?> belum dibaca</small>
      </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if($ann) : ?>
  <div class="news-new">
    <div class="my-alert rounded-0 shadow mx-2 mt-3 alert-dismissible show" role="alert">
      <h5 class="text-center text-white">
        <span class="badge bg-white text-<?=$ann[0]->urgency?> rounded-0 pr-3 mr-2 py-2 float-left" style="clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%); font-weight: 400; font-size: 16px;">Terbaru</span>
        <i class="fas fa-bullhorn"></i> PENGUMUMAN</h5>
      <strong class="text-white"><?=$ann[0]->ann_title; ?></strong>
      <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="text-an text-white">
        <?=$ann[0]->ann_text; ?>
      </div>
      <div class="text-white mt-5">
        <span>TTD</span>
        <p><?=date('Y-m-d',$ann[0]->time_created); ?></p>
        <span><?=$ann[0]->fullname; ?></span>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php foreach($ann as $an) : ?>
  <?php if($an->ann_id != $ann[0]->ann_id) : ?>
  <?php if($an->time_exp >  time()) : ?>
    <div class="list-group m-2">
      <a href="#" class="list-group-item border-0 shadow-sm list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1"><?=$an->ann_title ?></h5>
          <small class="text-muted"><?=date('Y-m-d',$an->time_created); ?></small>
        </div>
        <?php $rep = substr($an->ann_text,0 ,30);  ?>
        <p><?=$rep.'...'; ?></p>
        <small class="text-muted"><?=$an->fullname; ?></small>
      </a>
    </div>
  <?php endif; ?>
  <?php endif; ?>
<?php endforeach; ?>
<script type="text/javascript">

function detail_emp(user_id) {
  window.location.href = '<?=base_url('employee/detail/')?>'+user_id;
}

function load_replay_chat(chat_root_id){
  window.location.href = '<?=base_url('chat/load_reply_chat/')?>'+chat_root_id;
}

function getChatRoot() {
  $.ajax({
    url: '<?=base_url()?>home/get_chat_root/',
    success:function(res){
      if(res){
        let html = '';
        const data = JSON.parse(res);
        data.forEach(d => {
          html += `
          <div class="chat-by p-2" onclick='load_replay_chat(${d.chat_root_id})'>
            <div class="row no-gutters align-items-center">
              <div class="col-3 col-md-2">
                <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/')?>${d.image}" alt="">
              </div>
              <div class="col-6 col-md-7">
                <p>${d.from}</p>
                <small>${d.position_name}</small>
              </div>
              <div class="col-3 col-md-3 text-center">
                <small class="text-danger">
                ${(()=>{
                  if(d.count_chat_adm > 0){
                    return `${d.count_chat_adm} pesan belum dibaca`;
                  }else{
                    return ``;
                  }
                } )()}
                </small>
              </div>
            </div>
          </div>
          `;
        });
        $('#box_char_root').html(html);
      }
    }
  })
}



function get_chat_fa(){
  $.ajax({
    url:'<?=base_url()?>home/get_chat_fa/',
    success:function (res){
      let html ='';
      if(res){
        const data = JSON.parse(res);
        data.forEach(d => {
          html += `
            <small><i class="fas fa-bell text-danger"></i></small>
            <a href='<?=base_url("chat/index/")?>${d.to_user}' class="list-group-item list-group-item-action p-1 d-flex justify-content-between align-items-center px-2 rounded-0">
              <small class="text-danger"><b>${d.count_chat_emp} balasan</b> dari ${d.replay_from_emp} belum dibaca</small>
            </a>
          `;
        });
        $('#getCFA').html(html);
      }
    }
  })
}
get_chat_fa()
getChatRoot();
setInterval(() => {
get_chat_fa()
getChatRoot();  
}, 1000);


$('document').ready(function () {
  $('.box-all-users').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    }
  ]
});
})
</script>