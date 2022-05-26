<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">
        /*
            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }
        */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }
        body {
            font-family:  Helvetica, Arial, sans-serif;
            font-weight: 100;
            font-size: 12px;
            line-height: 30px;
            color: #777;
            background: #4c576e;
        }
        .container {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="url"],
        textarea,
        #img button[type="submit"] {
            font: 400 12px  Helvetica, Arial, sans-serif;
        }
        #img {
            background: #F9F9F9;
            padding: 25px;
            margin: 50px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px;
            text-align: center;
        }
        h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #777;
        }
        a:hover {
            font-weight: bold;
        }
        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }
        .imagem{
            width: 100%;
            margin-top: 20px;
            display: inline-block;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="url"],
        textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }
        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="tel"]:hover,
        input[type="url"]:hover,
        textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }
        textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
        }
        input[type="file"] {
            cursor: pointer;
            border: none;
            background: #4c576e;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }
        button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            background: #4c576e;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }
        button[type="submit"]:hover {
            background: #39455e;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }
        button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }
        .creator {
            text-align: center;
        }
        input:focus,
        textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }
        ::-webkit-input-placeholder {
            color: #888;
        }
        :-moz-placeholder {
            color: #888;
        }
        ::-moz-placeholder {
            color: #888;
        }
        :-ms-input-placeholder {
            color: #888;
        }
    </style>
</head>
<body>
<div class="container">
    <?php echo form_open_multipart('Welcome/image_upload/' , array('id' => 'img'));?>
    <h3>Images</h3>
    <h4><a href="<?php echo base_url().'index.php/Welcome';?>">Upload Images</a></h4>
    <?php
    $images = $this->db->get('image_upload')->result_array();
    foreach($images as $row):
        ?>
        <fieldset>
            <img src="<?php echo base_url().$row['image_url'];?>" class="imagem" alt="" />
        </fieldset>
    <?php
    endforeach;
    ?>
    <p class="creator">Script by <a href="https://colorlib.com" target="_blank" title="Colorlib">Swagata Datta</a></p>
    </form>
</div>

</body>