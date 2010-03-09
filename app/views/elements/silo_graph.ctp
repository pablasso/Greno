<script language="javascript" type="text/javascript" src="/js/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.flot.crosshair.js"></script>
<!--[if IE]><script language="javascript" type="text/javascript" src="/js/excanvas.min.js"></script><![endif]-->

<div id="placeholder" style="width:635px;height:220px;"></div>

<a id="previous_graph" href="javascript:reloadGraph(-2,-1);"><< anterior</a> | <a id="next_graph">siguiente >></a>

<script id="source" language="javascript" type="text/javascript">
$("#next_graph").hide();
$.getJSON("http://<?php echo $_SERVER['SERVER_NAME']; ?>/silos/get_graph/<?php echo $silo_id; ?>/-1/0", graph);

function graph(json) {
    var plot = $.plot($("#placeholder"),
                      [ { data: json.temperature.data, label: json.temperature.label, lines: { show: true }},
                        { data: json.humidity.data, label: json.humidity.label, yaxis: 2, lines: { show: true }},
						{ data: json.ventilador.data, label: json.ventilador.label, bars: { show: true }} ], {
                            grid: { hoverable: true, autoHighlight: true },
                            xaxis: { mode: 'time', timeformat: "%d/%b %h%p", min: json.start_timestamp, max: json.end_timestamp,
						 monthNames: ["ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic"] }
                        });

    var legends = $("#placeholder .legendLabel");
    legends.each(function () {
        $(this).css('width', $(this).width() + 3);
    });
};

function reloadGraph(start_day, end_day) {
	var range = 1;
	
	if (end_day >= 0)
		$("#next_graph").hide();
	else
		$("#next_graph").show();
	
	$.getJSON("http://<?php echo $_SERVER['SERVER_NAME']; ?>/silos/get_graph/<?php echo $silo_id; ?>/"+ start_day +"/"+ end_day, graph);

	var previous_start = start_day - range;
	var previous_end = end_day - range;
	var next_start = start_day + range;
	var next_end = end_day + range;

	$("#previous_graph").attr('href', 'javascript:reloadGraph(' + previous_start + ',' + previous_end + ');');
	$("#next_graph").attr('href', 'javascript:reloadGraph(' + next_start + ',' + next_end + ');');
}

</script>