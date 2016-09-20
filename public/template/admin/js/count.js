function countUp(count, classname)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = classname,
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}
countUp($('input[name=smarunpas]').val(), $('.smarunpas'));
countUp($('input[name=smarunpis]').val(), $('.smarunpis'));
countUp($('input[name=smaljpas]').val(), $('.smaljpas'));
countUp($('input[name=smaljpis]').val(), $('.smaljpis'));
countUp($('input[name=smatppas]').val(), $('.smatppas'));
countUp($('input[name=smatppis]').val(), $('.smatppis'));
countUp($('input[name=smaltpas]').val(), $('.smaltpas'));
countUp($('input[name=smaltpis]').val(), $('.smaltpis'));

countUp($('input[name=smprunpas]').val(), $('.smprunpas'));
countUp($('input[name=smprunpis]').val(), $('.smprunpis'));
countUp($('input[name=smpljpas]').val(), $('.smpljpas'));
countUp($('input[name=smpljpis]').val(), $('.smpljpis'));
countUp($('input[name=smptppas]').val(), $('.smptppas'));
countUp($('input[name=smptppis]').val(), $('.smptppis'));
countUp($('input[name=smpltpas]').val(), $('.smpltpas'));
countUp($('input[name=smpltpis]').val(), $('.smpltpis'));

countUp($('input[name=sdrunpas]').val(), $('.sdrunpas'));
countUp($('input[name=sdrunpis]').val(), $('.sdrunpis'));
countUp($('input[name=sdljpas]').val(), $('.sdljpas'));
countUp($('input[name=sdljpis]').val(), $('.sdljpis'));
countUp($('input[name=sdlbpas]').val(), $('.sdlbpas'));
countUp($('input[name=sdlbpis]').val(), $('.sdlbpis'));
countUp($('input[name=sdlespa]').val(), $('.sdlespa'));
countUp($('input[name=sdlespi]').val(), $('.sdlespi'));

countUp($('input[name=juma]').val(), $('.juma'));
countUp($('input[name=jumpa]').val(), $('.jumpa'));
countUp($('input[name=jumpi]').val(), $('.jumpi'));