<h1><?= Yii::t('app', UI_LK); ?></h1>

<?= Yii::t('app',UI_LK_USERNAME); ?>: <?php echo $lk['username']; ?><br/>

<a href="/user/setemail/"><?= Yii::t('app', UI_LK_SETEMAIL_LINK); ?></a><br/>
<a href="/user/setpassword/"><?= Yii::t('app', UI_LK_SETPASSWORD_LINK); ?></a><br/><!-- comment -->
<hr/>
<a href="/user/forget/"><?= Yii::t('app',UI_LK_FORGET_LINK); ?></a>
<hr/>
<a href="/material/additem/"><?= Yii::t('app',UI_LK_NEWMATERIAL_LINK); ?></a><br/>
<a href="/material/gallery?username=<?= $lk['username'] ?>"><?= Yii::t('app', UI_LK_MYMATERIALS_LINK) ?></a>

