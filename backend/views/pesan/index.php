<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Perpesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesan-index">        
    <div class='row'>
        <div class='col-md-8'>
            <div class='box'>
                <div class='box-header with-border'>
                    <center><h4 class='box-title'>Statistik Laporan SMS Anggota</h4></center>


                </div>

                <div class='box-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div id='container-chart'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $url = Yii::$app->urlManager->hostInfo.Yii::$app->request->baseUrl.'/file-upload/f3.png'; ?>
        <div class='col-md-4'>
            <div class='box'>
                <div class='box-header with-border'>
                    <center><h4 class='box-title'>Laporan Terakhir</h4></center>


                </div>

                <div class='box-body'>
                    
                            <ul id="lastLaporBox" class="products-list product-list-in-box with-border">
                                
                            </ul>
                        
                </div>
            </div>
        </div>
        <div class="clearfix"></div>    
    </div>
</div>
    
    <?php 
        $url_dasar = Yii::$app->urlManager->hostInfo.Yii::$app->request->baseUrl;
        $url_last = Yii::$app->urlManager->hostInfo.Yii::$app->request->baseUrl.'/index.php/pesan/ambil-data-last-lapor';
		$url_last2 = Yii::$app->urlManager->hostInfo.Yii::$app->request->baseUrl.'/index.php/lapor-pesan/count';
        $url_img = Yii::$app->urlManager->hostInfo.Yii::$app->request->baseUrl;
        $kode_last = <<< JS
        
        var request = $.post({
            url : '{$url_last}',
            method : "POST",
            dataType : "json"
        });
        
        request.success(function(data){
            var items = $('#lastLaporBox');
            for(i = 0; i<data.length; i++){
                var item = data[i];
                var url = '';
                if(item.nama.foto != '' ){
                    url = '{$url_img}/'+item.nama.foto;
                }else{
                    url = '{$url_dasar}/file-upload/f3.png';
                }
                
                items.append("<li class='item'><div class='product-img'><img src="+url+"></div><div class='product-info'><a href='#' class='product-title'>"+item.nama.nama_anggota+"</a><span class='product-description'>"+item.data.pesan+"</span></div></li>");
                console.log(item.nama.foto);
            }
        });
JS;
        $this->registerJs($kode_last);
    ?>

    <?php $this->registerJs(
    '
        
            $("#tombol_tambah").click(function(){
                $("#modal_tambah").modal("show")
                .find(".modal-content")
                .load($(this).attr("value"));           
            });
        
        

    ');
    ?>

<?php if (class_exists('backend\assets\AppAsset')) {
        backend\assets\ChartAsset::register($this);
    } else {
        app\assets\ChartAsset::register($this);
    } ?>
<?php 
	$chart = <<< JS
	
	var req = $.post({
		url : '{$url_last2}',
        method : "POST",
        dataType : "json"		
	});
	
	req.success(function(data){
		var dapil = [];
		var laki = [];
		var perempuan = [];
		
		for(i=0; i<data.length; i++){
			dapil[i] = data[i].nama_kelompok;
			laki[i] = parseInt(data[i].jml_cowo);
			perempuan[i] = parseInt(data[i].jml_prp);
		}
		jml = [{
			name: 'Laki - Laki',
			data: laki			
		}];
		jml  = [{
			name: 'Perempuan',
			data: perempuan			
		}];
		
		$('#container-chart').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: 'Statistik Berdasarkan Daerah'
			},
			xAxis: {
				categories: dapil
			},
			yAxis: {
				title: {
					text: 'Banyak Laporan'
				}
			},
			series: [{
				name: 'Laki - Laki',
				data: laki
			}, {
				name: 'Perempuan',
				data: perempuan
			}]
		});
		console.log(jml);
		
	});
JS;
	$this->registerJs($chart);
?>
