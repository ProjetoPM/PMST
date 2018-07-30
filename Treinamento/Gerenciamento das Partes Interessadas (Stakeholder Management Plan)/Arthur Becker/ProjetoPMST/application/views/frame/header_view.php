<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PMST</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?=base_url()?>assets/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/bootstrap-editable.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom tab icons -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/icone.png" type="image/x-icon">
    <link href="<?=base_url()?>assets/js/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/js/jquery-ui-1.11.4.custom/jquery-ui-custom-datepicker.css" rel="stylesheet" type="text/css" />
    
    <input type="hidden"  id="base-url" value="<?=base_url()?>"/>
</head>

<body>
    <div class="overlay"></div>
    <img id="loading"  width="250px" src="<?=base_url()?>assets/images/loading.gif" alt="Loading...">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">#</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>">
                    <div class="inline"> &nbsp;PMST </div>
                </a>

            </div>