<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="title" content="Ask online Form">
    <meta name="description" content="The Ask is a bootstrap design help desk, support forum website template coded and designed with bootstrap Design, Bootstrap, HTML5 and CSS. Ask ideal for wiki sites, knowledge base sites, support forum sites">
    <meta name="keywords" content="HTML, CSS, JavaScript,Bootstrap,js,Forum,webstagram ,webdesign ,website ,web ,webdesigner ,webdevelopment">
    <meta name="robots" content="index, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <title>Đăng ký</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/loginstyle.css">


</head>

<body>

    <div class="modal-wrap">

        <!-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif -->
        <!-- 
        @if($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors as $error)
                <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif -->

        <div class="modal-bodies">
            <div class="modal-body modal-body-step-1 is-showing">
                <div class="title">Đăng ký</div>
                <div class="description">Vui lòng nhập đầy đủ thông tin</div>
                <form action="{{route('submit-register')}}" method="post" onchange="changeForm()" onsubmit="validateFormRegister()">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                        <div id="name-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username*</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        <div id="username-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        <div id="email-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu*</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <div id="password-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Nhập lại mật khẩu*</label>
                        <input type="password" class="form-control" id="confirm-password" name="con-password" placeholder="Confirm your password" required>
                        <div id="confirm-password-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="phone-number">Số điện thoại*</label>
                        <input type="text" class="form-control" id="phone-number" name="phonenumber" placeholder="Enter your phone number" required>
                        <div id="phone-number-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Giới tính*</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                        <div id="gender-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Ngày sinh*</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required>
                        <div id="birthday-error"></div>
                    </div>

                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3>
                                    Đăng nhập với</h3>
                            </div>
                            <div class="col-md-12 sign-in28912">
                                <div class="btn-group btn-group-justified">
                                    <a href="{{ route('signin.facebook') }}" class="btn btn-primary btn-primary3838">Facebook</a> <a href="{{ route('signin.facebook') }}" class="btn btn-danger btn-danger37883">
                                        Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="button">Đăng ký</button>

                    </div>
                </form>
            </div>


        </div>
    </div>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>



</body>

<script>
    // Function to validate the form

    // Get the form element
    const form = document.querySelector('form');

    // Add event listener for form submission
    form.addEventListener('submit', function(event) {
        // Validate the form
        // alert('add');
        if (!validateForm()) {
            // If validation fails, prevent form submission
            event.preventDefault();
        }
    });

    function changeForm(){
        !event.preventDefault();
    }

    function validateFormRegister() {
        var nameInput = document.getElementById('name');
        var usernameInput = document.getElementById('username');
        var emailInput = document.getElementById('email');
        var passwordInput = document.getElementById('password');
        var confirmPasswordInput = document.getElementById('confirm-password');
        var phoneNumberInput = document.getElementById('phone-number');
        var genderInput = document.getElementById('gender');
        var birthdayInput = document.getElementById('birthday');

        var nameError = document.getElementById('name-error');
        var usernameError = document.getElementById('username-error');
        var emailError = document.getElementById('email-error');
        var passwordError = document.getElementById('password-error');
        var confirmPasswordError = document.getElementById('confirm-password-error');
        var phoneNumberError = document.getElementById('phone-number-error');
        var genderError = document.getElementById('gender-error');
        var birthdayError = document.getElementById('birthday-error');

        var hasError = false;

        if (nameInput.value.trim() === '') {
            nameError.style;
            nameError.classList.add('invalid-feedback');
            nameError.textContent = 'Vui lòng nhập họ và tên.';
            hasError = true;
        }

        if (usernameInput.value.trim() === '') {
            usernameError.style;
            usernameError.classList.add('invalid-feedback');
            usernameError.textContent = 'Vui lòng nhập tên đăng nhập.';
            hasError = true;
        }

        if (emailInput.value.trim() === '') {
            emailError.style;
            emailError.classList.add('invalid-feedback');
            emailError.textContent = 'Vui lòng nhập email.';
            hasError = true;
        }

        if (passwordInput.value.trim() === '') {
            passwordError.style;
            passwordError.classList.add('invalid-feedback');
            passwordError.textContent = 'Vui lòng nhập mật khẩu.';
            hasError = true;
        }

        if (confirmPasswordInput.value.trim() === '') {
            confirmPasswordError.style;
            confirmPasswordError.classList.add('invalid-feedback');
            confirmPasswordError.textContent = 'Vui lòng xác nhận mật khẩu.';
            hasError = true;
        }

        if (phoneNumberInput.value.trim() === '') {
            phoneNumberError.style;
            phoneNumberError.classList.add('invalid-feedback');
            phoneNumberError.textContent = 'Vui lòng nhập số điện thoại.';
            hasError = true;
        }

        if (genderInput.value.trim() === '') {
            genderError.style;
            genderError.classList.add('invalid-feedback');
            genderError.textContent = 'Vui lòng nhập giới tính.';
            hasError = true;
        }

        if (birthdayInput.value.trim() === '') {
            birthdayError.style;
            birthdayError.classList.add('invalid-feedback');
            birthdayError.textContent = 'Vui lòng nhập ngày sinh.';
            hasError = true;
        }
        
        if (hasError) {
            event.preventDefault();
        }
    }

</script>

</html>