@extends('layouts.app')

@section('content')
    <!--<div class="row">-->
        <!--<div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">-->
        <!--    <div class="questionpost">-->
                <!--<div class="panel panel-default">-->
        <!--                <p class="item-title">{{ $questionpost->content }}</p>-->
                <!--</div>-->
        <!--    </div>-->
        <!--</div>-->
        
        
        <div class="row1">
        <div class="col-sm-6 col-xs-12">
            <div class="yes-users">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        Yesしたユーザ<span class="badge">{{ $count_yes_users }}</span></a></li>
                    </div>
                    <div class="panel-body">
                        @foreach ($yes_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-sm-6 col-xs-12">
            <div class="no-users">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center">
                        Noしたユーザ<span class="badge">{{ $count_no_users }}</span></a></li>
                    </div>
                    <div class="panel-body">
                        @foreach ($no_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    <!--</div>-->
    <div class = "chart">
  <h1>{{ $questionpost->content}}に関する集計結果</h1>

  <div style="width: 50%">
    <canvas id="chart" height="450" width="500"></canvas>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <!-- もしくは<script src="Chart.min.js"></script> -->
  <script>
  var pieData = [
    {
      value: "{{ $count_yes_users }}",
      color:"blue",
      highlight: "blue",
      label: "Yes"
    },
    {
      value: "{{ $count_no_users }}",
      color: "red",
      highlight: "red",
      label: "No"
    }
    
  ];

  window.onload = function(){
    var ctx = document.getElementById("chart").getContext("2d");
    window.myPie = new Chart(ctx).Pie(pieData);
  };
</script>
   </div>
@endsection