<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/helloworld.css') }}">
</head>

<body>
    <section>
        <h1>Hello World !</h1>
        <div class="card">
            <div class="img-bx">
            <img src="{{ asset('img/profile.png') }}" alt="img" />
            </div>
            <div class="content">
                <div class="detail">
                    <h2>Fellah Afifah Filzah Pertiwi<br /><span>FullStack Web Developer</span></h2><br>
                    <p>D-IV Manajemen Informatika</p>
                    <p>Politeknik Negeri Sriwijaya</p><br>
                    <ul class="sci">
                        <li>
                            <a href="mailto:fellahsyihab1@gmail.com"><i class="fas fa-envelope"></i></a>
                        </li>
                        <li>
                            <a href="www.linkedin.com/in/fellahafifahfilzahpertiwi"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/fellahsyihab1_"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/helloworld.js') }}"></script>
</body>

</html>