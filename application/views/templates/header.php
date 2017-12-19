<html>
    <head>
        <title>ciBlog</title>
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>  
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                        <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
                        <li><a href="<?php echo base_url(); ?>categories">Categorias</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!$this->session->userdata('logged_in')) : ?>
                            <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
                            <li><a href="<?php echo base_url(); ?>users/register">Registrarse</a></li>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('logged_in')) : ?>
                            <li><a href="<?php echo base_url(); ?>posts/create">Crear Post</a></li>
                            <li><a href="<?php echo base_url(); ?>categories/create">Crear Categoria</a></li>
                            <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <!-- Flash mensajes -->
            <?php if ($this->session->flashdata('user_registered')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('post_created')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('post_updated')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('category_created')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_created') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('post_deleted')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('login_failed')): ?>
                <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('user_loggedin')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('user_loggedout')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('category_deleted')): ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_deleted') . '</p>'; ?>
            <?php endif; ?>