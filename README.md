Table structure 

1. user: username, passhash and email
2. materials: title, message, img_src for image link, user_id

Features:

1. register user, login user, forget user (delete account), edit own email, edit own password
2. view common gallery, view gallery by username, view full picture
3. Russian/english localization (/messages/{ru,en})

This is draft - in database passhash stores as sha1. Don't do it in real projects
