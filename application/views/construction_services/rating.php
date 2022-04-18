<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link href="<?= base_url() ?>assets/css/star-rating.css" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="<?= base_url() ?>assets/themes/krajee-fa/theme.css" media="all" type="text/css" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"> -->
<script src="<?= base_url() ?>assets/js/star-rating.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js//locales/de.js"></script>

<script src="<?= base_url() ?>assets/themes/krajee-fa/theme.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/themes/krajee-svg/theme.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/themes/krajee-gly/theme.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/themes/krajee-uni/theme.js" type="text/javascript"></script>

<?php extract(getViewEvaluation($view_name)) ?>
<div style="float: right !important;">
    <form id="evaluationForm" method="POST" action="<?php echo base_url('insert_view_evaluation'); ?>">
        <?php if ($_SESSION['access_level'] != 1) { ?>
            <input disabled type="text" class="rating rating-loading" value="<?= $average ?>" data-size="md" data-theme="krajee-fa" name="points">
        <?php } else { ?>
            <input id="rate" onchange="mySubmit(this.form)" type="text" class="rating rating-loading" value="<?= $average ?>" data-size="md" data-theme="krajee-fa" name="points">
        <?php } ?>
        <input id="view_name" type="hidden" value="<?= $view_name ?>" name="view">
    </form>
</div>
<div style="float: right !important;margin-right: 10px;margin-top: 5px;">
    <a id="rate_description" class="btn-md btn-default" data-toggle="tooltip" data-placement="left" title="<?php echo $evaluationTxt; ?>"><i class="glyphicon glyphicon-tag"></i></a>
</div>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />


<script>
    function mySubmit(theForm) {
        $.ajax({ // create an AJAX call...
            data: $(theForm).serialize(), // get the form data
            type: $(theForm).attr('method'), // GET or POST
            url: $(theForm).attr('action'), // the file to call
            dataType: "json",
            success: function(result) { // on success..
                $("#rate_description").attr("data-original-title", result.evaluationTxt);
                $("#rate").attr("value", result.average);
                alertify.success('Rate saved successfully');
            }
        });
    }
</script>

<script>
  $(document).on('ready', function() {

    $('.kv-fa').rating({
      theme: 'krajee-fa',
      filledStar: '<i class="fa fa-star"></i>',
      emptyStar: '<i class="fa fa-star-o"></i>'
    });

    $('.rating,.kv-fa').on(
      'change',
      function() {
        console.log('Rating selected: ' + $(this).val());
      });
  });
</script>


<style>
    .page-header {
        border-bottom: 1px solid #eee;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
        font-size: 2em;
        margin: 10px 0 20px 0;
    }

    .h1,
    h1 {
        font-size: 27px;
    }
</style>