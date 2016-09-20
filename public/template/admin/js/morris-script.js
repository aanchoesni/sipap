var Script = function () {

    //morris chart

    $(function () {
      // data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type
      Morris.Bar({
        element: 'cbongkar',
        data: <?php echo json_encode($cbongkar); ?>,
        // data: [
        //   {tgl: '$bulan', harga: 5000000000},
        //   {tgl: 'iPhone 3G', harga: 250000000000},
        //   {tgl: 'iPhone 3GS', harga: 300000000000},
        //   {tgl: 'iPhone 4', harga: 100000000000},
        //   {tgl: 'iPhone 4S', harga: 650000000000},
        //   {tgl: 'iPhone 5', harga: 136000000000}
        // ],
        xkey: 'tgl',
        ykeys: ['harga'],
        labels: ['Harga'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: ['#6883a3']
      });

      Morris.Bar({
        element: 'cmuat',
        data: [
          {device: 'iPhone', geekbench: 5000000000},
          {device: 'iPhone 3G', geekbench: 250000000000},
          {device: 'iPhone 3GS', geekbench: 300000000000},
          {device: 'iPhone 4', geekbench: 100000000000},
          {device: 'iPhone 4S', geekbench: 650000000000},
          {device: 'iPhone 5', geekbench: 136000000000}
        ],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Geekbench'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: ['#6883a3']
      });

      $('.code-example').each(function (index, el) {
        eval($(el).text());
      });
    });

}();




