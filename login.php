<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<header class="site-header">
    <div class="container">
        <div class="logo">
            <div class="logo__title h3">Lesson site</div>
            <div class="logo__subtitle h6">About MVC</div>
        </div>
    </div>
</header><nav class="site-nav">
    <div class="container header-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
                        <li class="nav-item">
                <a class="nav-link" href="/contacts">Contacts</a>
            </li>
        </ul>
        <ul class="nav">
                            <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                                                <li class="nav-item">
                <form method="GET">
                    <input type="hidden" value="en" name="ln">
                    <button class="btn nav-link"><img class="flack" src="../../assets/images/usd.png" alt=""></button>
                </form>
            </li>
            <li class="nav-item">
                <form method="GET">
                    <input type="hidden" value="ua" name="ln">
                    <button class="btn nav-link"><img class="flack" src="../../assets/images/uk.png" alt=""></button>
                </form>
            </li>
            <li class="nav-item">
                <form method="GET">
                    <input type="hidden" value="pl" name="ln">
                    <button class="btn nav-link"><img class="flack" src="../../assets/images/pl.png" alt=""></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<div class="site-content">
    <div class="container">
        <main class="main">
            <h1></h1>
            <hr>

            <form class="d-inline" method="POST">
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="username">Username</label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="username" name="username" value="">
                    </div>
                </div>
                <div class="row m-3 align-items-start">
                    <div class="col-auto">
                        <label class="col-form-label" for="password">Password</label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="password" name="password" id="password" value="">
                    </div>
                </div>
                <div class="row m-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label" for="remember_user">Remember Me</label>
                    </div>
                    <div class="col-auto">
                        <input type="checkbox" name="remember_user" id="remember_user">
                    </div>
                </div>
                <input class="btn btn-change" name="login" value="Login" type="submit">
                <a class="btn btn-cancel" href="/forgot_pass">Forgot Password?</a>
            </form>
            <hr>
            <div>
                            </div>        </main>
    </div>
</div>
<footer class="site-footer text-white">
    <div class="container">
        &copy; MVC site
    </div>
</footer>
<section class="wrapplook">
    <div class="terminal">
        <h1>Admin terminal</h1>
        <textarea name="" id="terminal" rows="10"></textarea>
    </div>
</section>
        <script src="../../assets/js/library/knockout-3.5.1.debug.js"></script>
        <script src="../../assets/js/library/simpleGrid.js"></script>
        <script src="../../assets/js/terminal.js"></script>
        <script>
            let initialData = null;

            let PagedGridModel = function(items) {
                this.items = ko.observableArray(items);

                this.gridViewModel = new ko.simpleGrid.viewModel({
                    data: this.items,
                    columns: [{
                            headerText: "Name:",
                            rowText: "name"
                        },
                        {
                            headerText: "Title:",
                            rowText: "title"
                        },
                        {
                            headerText: "Message:",
                            rowText: "message"
                        }
                    ],
                    pageSize: 4
                });
            };

            ko.applyBindings(new PagedGridModel(initialData.flat()));
            document.querySelector('#editor').addEventListener('change', function(e) {
                console.log(e.target.value);
                if (e.target.value == "viewer") {
                    document.querySelector('#viewer-look').classList.remove('default');
                    document.querySelector('#editor-look').classList.add('default');
                } else if (e.target.value == "editor") {
                    document.querySelector('#editor-look').classList.remove('default');
                    document.querySelector('#viewer-look').classList.add('default');
                }
            })
        </script>
        </body>

        </html>