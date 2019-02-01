<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Test</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrapper">
    <main class="main-content">
        <div class="my-profile">
            <h2 class="heading"> Профиль последнего созданного User'a </h2>
            <div class="profile">
                @if (isset($currentUser))
                    <div class="avatar">
                        <img src="images/{{ $currentUser->avatar }}" alt="Аватар" class="avatar__pic">
                    </div>
                    <div class="information">
                        <div class="nickname">
                            <p>{{ $currentUser->nickname }}</p>
                        </div>
                        <div class="user-name">
                            <span class="name">{{ $currentUser->first_name }}</span>
                            <span class="surname">{{ $currentUser->second_name }}</span>
                        </div>
                        <a href='tel:+11111111' class="phone">{{ $currentUser->phone }}</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="article_list">
            @foreach ($users as $user)
                @if ($user->articles)
                    <p> Пользователь {{ $user->nickname }} имеет следующие статьи:</p>
                    @foreach ($user->articles as $article)
                        <ul>
                            <li>
                                <b>{{ $article->title }}:</b>
                            {{{ str_limit($article->text, $limit = 250, $end = '...') }}}
                            </li>
                        </ul>
                    @endforeach
                @else
                    <article>
                        <div class="post-content">
                            <p>{{ __('site.no_articles') }}</p>
                        </div>
                    </article>
                @endif
            @endforeach
        </div>

        <div class='edit-profile'>
            <h2 class="heading"> Создать объект User в базе данных: </h2>

            @include('errors')

            {{ Form::open(['route' => 'profile.store', 'files' => true]) }}
                <ul class="form__list">
                    <li class="form__item">
                        <label class='form__label' for="nickname">Никнейм:</label>
                        <input class='form__input' id='nickname' type="text" name="nickname">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="name">Имя:</label>
                        <input class='form__input' id='name' type="text" name="first_name">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="surname">Фамилия:</label>
                        <input class='form__input' id='surname' type="text" name="second_name">
                    </li>
                    <li class="form__item">
                        <label class='form__inline-label' for="avatar">Аватар:</label>
                        <input class='form__inline-input' id='avatar' type="file" value='@csrf' name="avatar">
                    </li>
                    <li class="form__item">
                        <label class='form__label' for="phone">Телефон:</label>
                        <input class='form__input' id='phone' type="text" name="phone">
                    </li>
                    <li class="form__item">
                        <div class="form__title">Пол:</div>
                        <label class='form__inline-label' for="male">Мужской</label>
                        <input class='form__inline-input' name='sex' id='male' type="radio" value="male">
                        <label class='form__inline-label' for="female">Женский</label>
                        <input class='form__inline-input' name='sex' id='female' type="radio" value="female">
                    </li>
                    <li class="form__item">
                        <label class='form__inline-label' for="showPhone">Я согласен получать email-рассылку</label>
                        <input class='form__inline-input' id='showPhone' type="checkbox" name="sendmail_status" value="active">
                    </li>
                    <li class="form__item">
                        <button class='form__button' type="submit">Отправить</button>
                    </li>
                </ul>
            {{ Form::close() }}
        </div>
    </main>
</div>
</body>
</html>