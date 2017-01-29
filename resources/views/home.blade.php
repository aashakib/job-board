@extends('layouts.main-layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">All Jobs</div>
                            <div class="panel-body">
                                {{$statistics['total']}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Published</div>
                            <div class="panel-body">
                                {{$statistics['published']}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Spam</div>
                            <div class="panel-body">
                                {{$statistics['spam']}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="chart"></div>

@section('custom_css')
    <style>

    </style>
    @endsection
@section('custom_js')
    <script>
        var w = 600;
        var h = 250;

        var dataset = [
            { key: 0, value: 5 , month: 'A'},
            { key: 1, value: 10 , month: 'B'},
            { key: 2, value: 13 , month: 'C'},
            { key: 3, value: 19 , month: 'D'}];

        var xScale = d3.scale.ordinal()
            .domain(d3.range(dataset.length))
            .rangeRoundBands([0, w], 0.05);

        var yScale = d3.scale.linear()
            .domain([0, d3.max(dataset, function(d) {return d.value;})])
            .range([0, h]);

        var key = function(d) {
            return d.key;
        };

        //Create SVG element
        var svg = d3.select("#chart")
            .append("svg")
            .attr("width", w)
            .attr("height", h);

        //Create bars
        svg.selectAll("rect")
            .data(dataset, key)
            .enter()
            .append("rect")
            .attr("x", function(d, i) {
                return xScale(i);
            })
            .attr("y", function(d) {
                return h - yScale(d.value);
            })
            .attr("width", xScale.rangeBand())
            .attr("height", function(d) {
                return yScale(d.value);
            })
            .attr("fill", function(d) {
                return "rgb(0, 0, " + (d.value * 10) + ")";
            });

        //Create labels
        svg.selectAll("text")
            .data(dataset, key)
            .enter()
            .append("text")
            .text(function(d) {
                return d.value;
            })
            .attr("text-anchor", "middle")
            .attr("x", function(d, i) {
                return xScale(i) + xScale.rangeBand() / 2;
            })
            .attr("y", function(d) {
                return h - yScale(d.value) + 14;
            })
            .attr("font-family", "sans-serif")
            .attr("font-size", "11px")
            .attr("fill", "white");

    </script>
@endsection
@endsection
