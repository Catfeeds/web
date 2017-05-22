<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="<?php echo !empty($user['image'])?$user['image']:'/css/coreCss/new/img/profile_small.jpg' ?>" />
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo !empty($user['nickname'])?$user['nickname']: $user['username']?></strong>
                        </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="mailbox.html">Mailbox</a></li>
                    <li class="divider"></li>
                    <li><a href="/user/login/login-out">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                IN+
            </div>
        </li>
        <?php
        foreach($data as $key=>$v){
            if(isset($v['children'])) {
                ?>
                <li <?php if (strstr($_SERVER['REQUEST_URI'], $v['path'])) { ?> class="active" <?php } ?>>
                    <a href="<?php echo $v['path'] ?>"><i class="fa fa-th-large"></i> <span
                            class="nav-label"><?php echo $v['name'] ?></span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php
                        foreach ($v['children'] as $va) { ?>
                            <li<?php if (strstr($_SERVER['REQUEST_URI'], $va['path'])) { ?> class="active" <?php } ?> >
                                <a href="<?php echo $va['path'] ?>"><?php echo $va['name'] ?></a></li>
                            <?php
                        }
                        ?>
                        <?php if ($key == 0) { ?>
                            <li <?php if (strstr($_SERVER['REQUEST_URI'], 'basic/index/index')) { ?> class="active" <?php } ?> ><a href="/basic/index/index">模块管理</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
            } else { ?>
                <li <?php if (strstr($_SERVER['REQUEST_URI'], $v['path'])) { ?> class="active" <?php } ?>>
                    <a href="<?php echo $v['path'] ?>index/index"><i class="fa fa-diamond"></i> <span class="nav-label"><?php echo $v['name'] ?></span></a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
 </div>

