<?php
    $account = $lesson->ownerBy;
?>
<?php if ($account->skype) : ?>
    <div class="skype">
        <a href="skype:<?php echo $account->skype?>?chat">
            <span style="color:#fff"><?php echo $account->fullname?></span>
        </a>
    </div>
<?php endif; ?>
