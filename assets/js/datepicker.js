     
      //////////////////////////////////
      // Start Date & End Date
      //////////////////////////////////
      var currentDate = new Date();
      var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

      var startDate = $("#startDate").datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy',
        //language: 'pt-BR', //Idioma do Calendario
        container: container,
        keyboardNavigation: true,
        orientation: "bottom",
        todayHighlight : true,
        startDate: today,
      }).on('changeDate', function(ev) {
        var newDate = new Date(ev.date.setDate(ev.date.getDate() + 1));
        endDate.datepicker("setStartDate", newDate);
      });
      
      //Start Date Ends Here
      var endDate = $("#endDate").datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy',
        //language: 'pt-BR', //Idioma do Calendario
        container: container,
        keyboardNavigation: true,
        orientation: "bottom",
        startDate: today,
        /*todayHighlight : true,*/
      });
      //End Date Ends Here
