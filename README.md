UI Пользовательский интерфейс

![Join us, eng Регистрация, английская локаль](https://www.dropbox.com/s/o51w79ctwek25q0/user_join_us_en.png?raw=1 "")

![Join us, rus Регистрация, русская локаль](https://www.dropbox.com/s/o51w79ctwek25q0/user_join_us_en.png?raw=1 "")

![Exposition Общая лента](https://www.dropbox.com/s/qogsqy49jw1szvb/material_exposition.png?raw=1 "")

![Guest gallery Галерея пользователя](https://www.dropbox.com/s/in8iimtl4afe5ya/material_gallery_guest.png?raw=1 "")

![Guest full material Гостевой просмотр материала](https://www.dropbox.com/s/25exomprbygyqae/material_guest_view.png?raw=1 "")

![Login page Вход на сайт](https://www.dropbox.com/s/bfg0b3gbsw1jrqc/material_login_page.png?raw=1 "")

![Material view if own Просмотр материала владельцем](https://www.dropbox.com/s/qdqmleansrwzhwi/material_view_if_own.png?raw=1 "")

![Material view if not own Просмотр материала не владельцем](https://www.dropbox.com/s/7mcrju1k3t6em9f/material_user_not_owned.png?raw=1 "")

![Change email Смена email](https://www.dropbox.com/s/ficy3dl286w0ggo/user_change_email.png?raw=1 "")

![Forget, delete account Удалить аккаунт](https://www.dropbox.com/s/sn3peba0ileqju9/user_forget_account.png?raw=1 "")

![New material Новый материал](https://www.dropbox.com/s/njylolgp9907qf9/user_newmaterial_en.png?raw=1 "")

![Create material Добавление материала](https://www.dropbox.com/s/nm8fecy53kwap4d/user_post_to_site.png?raw=1 "")

![Private area, en Личный кабинет на английском](https://www.dropbox.com/s/vxu7s1ch7rlidkx/user_private_area_en.png?raw=1 "")

![Private area, ru Личный кабинет на русском](https://www.dropbox.com/s/macyvthhgpgjkea/user_private_area_ru.png?raw=1 "")

Table structure 

1. user: username, passhash and email
2. materials: title, message, img_src for image link, user_id

Features:

1. register user, login user, forget user (delete account), edit own email, edit own password, private area
2. view common gallery, view gallery by username, view full picture, remove own pictures
3. Russian/english localization (/messages/{ru,en})

There are 3 possible cases on the page with full view of single material
1. the user has not entered the site - we show that you need to log in to take action
2. the user is on the site, but looks material of other user - we inform you that the user is not the owner
3. the user is on the site and looks own material - we allow the action, for example, deletion

This is just draft - in database passhash stores as sha1. Don't do it in real projects


====

Структура таблиц

1. Пользователь user: никнейм username, хеш пароля passhash и электропочта email
2. Таблица material: заголовок материала title, текст описания message, ссылка на картинку img_src,
и внешний ключ user_id для связи с таблицей пользователи

Функции:

1. Регистрация, вход, забыть (удаление аккаунта), правка почты, смена пароля, личный кабинет
2. Просмотр общей галереи, просмотр галереи по имени пользователя, просмотр полного описания картинки, удаление
своего материала
4. Локализация (русский/английский в /messages/{ru,en} )

На странице с полным материалом возможны 3 случая
1. пользователь не зашел на сайт - отображаем, что для действий надо залогиниться
2. пользователь на сайте, но смотрит чужой материал - сообщаем, что пользователь не владелец
3. пользователь на сайте и смотрит свой материал - разрешаем действие, например, удаление

Это не более, чем черновик - пароль в базе хранится в sha1. Не делайте так в реальных проектах
