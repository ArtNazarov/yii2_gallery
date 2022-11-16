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
