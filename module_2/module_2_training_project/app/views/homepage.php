
<?php $this->layout('layout', ['title' => 'List all users']) ?>

<div class="subheader">
                <h1 class="subheader-title">
                    <i class='subheader-icon fal fa-users'></i> 
                    Список пользователей    
                </h1>
            </div>
            <?php foreach($users as $user):?>
            <div class="row" id="js-contacts">
                <div class="col-xl-4">
                    <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="oliver kopyov">
                        <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                            <div class="d-flex flex-row align-items-center">
                                <span class="status status-success mr-3">
                                    <span class="rounded-circle profile-image d-block " style="background-image:url('<?=$user['avatar'];?>'); background-size: cover;"></span>
                                </span>
                                <div class="info-card-text flex-1">
                                    <a href="javascript:void(0);" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                                        <?=$user['username'];?>
                                        <i class="fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>
                                        <i class="fal fa-angle-down d-inline-block ml-1 fs-md"></i>
                                    </a>
                                    
                                    <?php if($_SESSION['auth']==true):?>
                                        
                                               <div class="dropdown-menu">
                                                
                                               <a class="dropdown-item" href="/php/lessons_php/module_2/module_2_training_project/public/index.php/page_profile/<?=$user['id'];?>">
                                                <i class="fa fa-edit"></i>
                                                Открыть профиль</a> 
                                                <?php endif;?> 
                                                <?php if($_SESSION['status']=='admin' OR $_SESSION['status']=='developer' OR $_SESSION['username']==$user['username']):?> 
                                                <a class="dropdown-item" href="/php/lessons_php/module_2/module_2_training_project/public/index.php/edit_user/<?=$user['id'];?>">
                                                <i class="fa fa-edit"></i>
                                                Редактировать</a>
                                                <a class="dropdown-item" href="security.php?users_id=<?=$user['id'];?>">
                                                <i class="fa fa-lock"></i>
                                                Безопасность</a>
                                                <a class="dropdown-item" href="/php/lessons_php/module_2/module_2_training_project/public/index.php/status/<?=$user['id'];?>">
                                                <i class="fa fa-sun"></i>
                                                Установить статус</a>
                                                <a class="dropdown-item" href="media.php?users_id=<?=$user['id'];?>">
                                                <i class="fa fa-camera"></i>
                                                Загрузить аватар
                                                </a>
                                                <a href="delete.php?users_id=<?=$user['id'];?>" class="dropdown-item" onclick="return confirm(\'are you sure?\');">
                                                <i class="fa fa-window-close"></i>
                                                Удалить
                                                </a>   
                                                </div>
                                                  
                                            
                                    <?php endif;?> 
                                    </div>
                                <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                                    <span class="collapsed-hidden">+</span>
                                    <span class="collapsed-reveal">-</span>
                                </button>   
                                    <span class="text-truncate text-truncate-xl"><?=$user['occupation'];?></span>
                                
                                
                                
                            </div>
                        </div>
                    
                        
                        <?php if(\Delight\Cookie\Session::get($author)!=true):?>   
                        <div class="card-body p-0 collapse show">
                         
                                        <div class="p-3">
                                        <a href="tel:+13174562564" class="mt-1 d-block fs-sm fw-400 text-dark">
                                        <i class="fas fa-mobile-alt text-muted mr-2"></i><?=$user['phone'];?></a>
                                        <a href="mailto:oliver.kopyov@smartadminwebapp.com" class="mt-1 d-block fs-sm fw-400 text-dark">
                                        <i class="fas fa-mouse-pointer text-muted mr-2"></i><?=$user['email'];?></a>
                                        <address class="fs-sm fw-400 mt-4 text-muted">
                                        <i class="fas fa-map-pin mr-2"></i><?=$user['city'];?></address>
                                        <div class="d-flex flex-row">
                                        <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#4680C2">
                                        <i class="fab fa-vk"><?=$user['vk'];?></i>
                                        </a>
                                        <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#38A1F3">
                                        <i class="fab fa-telegram"><?=$user['telegram'];?></i>
                                        </a>
                                        <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#E1306C">
                                        <i class="fab fa-instagram"><?=$user['instagram'];?></i>
                                        </a>
                                        </div>
                                        </div>
                                        
                                        
                                        <?php else:?>
                                        <div class="subheader">
                                        <h6 class="subheader-title">
                                        <i class='subheader-icon fal fa-users'></i> 
                                        Информация для зарегистрированных пользователей   
                                        </h6>
                                        <a href="/php/lessons_php/module_2/module_2_training_project/public/index.php/login" class="btn-link text-white ml-auto ml-sm-0">
                                        Войти
                                        </a>
                                        <div class="blankpage-footer text-center">
                                        Нет аккаунта? <a href="/php/lessons_php/module_2/module_2_training_project/public/index.php/register"><strong>Зарегистрироваться</strong>
                                        </div>
                                        </div> 
                            <?php endif;?>  
                            </div> 
                        </div>                   
                    </div>
                </div>
            </div>
                        <?php endforeach;?>

         





