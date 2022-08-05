<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,600,700" rel="stylesheet">
<style>
    * {
        transition: all 200ms ease-in-out;
    }
    html {
        height: 100%;
    }
    body {
        background: #232020;
        font-family: 'Oswald', sans-serif;
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }
    .content {
        flex: 1;
    }
    .admin-text {
        max-width: 375px;
        width: 100%;
        margin: 0 auto;
        letter-spacing: 3px;
        color: rgba(0,5,20,.65);
        text-transform: uppercase;
        font-family: 'Oswald', sans-serif;
    }
    .client-logo {
        margin: 0 auto 1rem;
        display: block;
    }
    .panel {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.125);
        border: 1px solid rgba(0,0,0,0.45);
        max-width: 375px;
        width: 100%;
        padding: 2rem;
        margin: 0 auto;
        margin-top: 10%;
    }

    label {
        color: #aaa;
        font-weight: 600;
    }

    input[type="text"],
    input[type="password"]{
        border-radius: 3px;
        border: 2px solid #dedede;
        box-shadow: none;
        color: #555;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border: 2px solid #dedede;
    }

    input[type="submit"] {
        background: #f47621;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 1.25rem;
        border: 0 none;
        border-radius: 3px;
        padding: 1.5rem;
        line-height: 0;
        display: block;
        width: 100%;
        font-family: 'Oswald', sans-serif;
    }

    input[type="submit"]:hover {
        background: #e36510;
    }

    .forgot-pw {
        display: block;
        text-align: center;
        margin-top: .875rem;
        font-size: 1rem;
    }
    footer {
        padding-top: 20px;
        text-align: center;
    }
    footer img {
        opacity: .5;
        margin-bottom: 1rem;
    }
    footer img:hover {
        opacity: 1;
        cursor: pointer;
    }
    footer .row {
        max-width: 100%;
    }

    @media screen and (min-width: 641px) {
        footer .columns:nth-child(1) {
            text-align: left;
        }
        footer .columns:nth-child(2) {
            text-align: right;
        }
    </style>


    <div class="content">
        <div class="panel">
            <p class="admin-text m-top-xl">Admin Login</p>
            <hr style="width:50%;text-align:left;margin-left:0;color:#E36510;">
            <?php
            echo form_open(base_url() . 'index.php/login/logar_admin', array(
                'id' => 'logar_admin'
            ));
            ?>
            <div>
                <label id="admin_email">Email:</label>&nbsp;
                <input  name="admin_email" type="text" />
            </div>      
            <div>
                <label id="admin_password" >Password:</label>&nbsp;
                <input name="admin_password" type="password" />
            </div>
            </br>
            <div>
                <input name="Login" type="submit" />
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

    <footer>
        <div class="row">
            <div class="columns medium-6">
                <img src="https://www.captiva2-webdev.com/tourgreens/images/captiva-logo-watermark.png" alt="" />
            </div>
            <div class="columns medium-6">
                <img src="https://www.captiva2-webdev.com/tourgreens/images/empoweren-logo-watermark.png" alt="" />
            </div>
        </div>
    </footer>