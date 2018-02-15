<?php /* main */ 

$tasks = frl_get_tasks();
$log =  frl_get_log();
$actions = frl_get_actions($tasks, $log);
$metrics = frl_count_metrics($tasks, $log);

?>
<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">За неделю</h3>
							<p class="panel-subtitle">7 фев. - 14 фев. 2018</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number"><?php echo $metrics['open'];?></span>
											<span class="title">Открытых</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number"><?php echo $metrics['offers'];?></span>
											<span class="title">Предложений</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?php echo $metrics['response'];?></span>
											<span class="title">откликов</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number"><?php echo $metrics['wait'];?></span>
											<span class="title">Ждут уточнения</span>
										</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Открытые задачи</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Задание</th>
												<th>Подопечный</th>
												<th>Дата</th>
												<th>Статус</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($tasks as $t) {
											$status = $t[4];
											$status_css = '';
											switch($status){
												case 'Ждет уточнения';
													$status_css = 'label-warning';
													break;
												case 'Подтверждено';
													$status_css = 'label-success';
													break;
												case 'Идет набор';
													$status_css = 'label-primary';
													break;
												default: 
													$status_css = 'label-regular';
													break;
											}
										?>	
											<tr>
												<td><a href="#"><?php echo (int)$t[0];?></a></td>
												<td><?php echo $t[1];?></td>
												<td><?php echo $t[2];?></td>
												<td><?php echo $t[3];?></td>
												<td><span class="label <?php echo $status_css;?>"><?php echo $status;?></span></td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><!--<i class="fa fa-clock-o"></i> Last 24 hours--></span></div>
										<div class="col-md-6 text-right"><a href="#" class="btn btn-primary"> Все</a></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-7">
							<!-- TODO LIST -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ждут реакции</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled todo-list">
										<li>
											<label class="control-inline fancy-checkbox">
												<!--<input type="checkbox"><span></span>-->
											</label>
											<p>
												<span class="title">Урок русского языка. Вика Г. </span>
												<span class="short-description">Уточнить время урока.</span>
												<span class="date">11.02.2018</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
										<li>
											<label class="control-inline fancy-checkbox">
												<!--<input type="checkbox"><span></span>-->
											</label>
											<p>
												<span class="title">Ремонт ручек окна. Александр М.</span>
												<span class="short-description">Уточнить время встречи.</span>
												<span class="date">11.02.2018</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
										<li>
											<label class="control-inline fancy-checkbox">
												<!--<input type="checkbox"><span></span>-->
											</label>
											<p>
												<strong>Тренировочное собеседование. Сергей Ш.</strong>
												<span class="short-description">Уточнить время встречи.</span>
												<span class="date">10.02.2018</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
										<li>
											<label class="control-inline fancy-checkbox">
												<!--<input type="checkbox"><span></span>-->
											</label>
											<p>
												<strong>Тренировочное собеседование. Николай Б.</strong>
												<span class="short-description">Уточнить время встречи.</span>
												<span class="date">10.02.2018</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
									</ul>

									<button type="button" class="btn btn-primary btn-bottom">Все</button>
								</div>
							</div>
							<!-- END TODO LIST -->
						</div>
						<div class="col-md-5">
							<!-- TIMELINE -->
							<div class="panel panel-scrolling">
								<div class="panel-heading">
									<h3 class="panel-title">Монитор</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled activity-list">
									<?php foreach ($log as $i => $l) {
										$time_l = $i+12;
										$time = date('d.m.Y H:i', strtotime($time_l+' hours ago'));
								?>
									<li>
										<p><a href="#"><?php echo $l[1];?></a> <?php echo $l[2];?> <span class="timestamp"><?php echo $time;?></span></p>
									</li>
								<?php
									}
								?>
									</ul>
									<button type="button" class="btn btn-primary btn-bottom">Все</button>
								</div>
							</div>
							<!-- END TIMELINE -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Пульс</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled task-list">
										<li>
											<p>Зависает задач <span class="label-percent">20%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">
													<span class="sr-only">20% зависает</span>
												</div>
											</div>
										</li>
										<li>
											<p>Отклик<span class="label-percent">80%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
													<span class="sr-only">80% активность</span>
												</div>
											</div>
										</li>
										
										<li>
											<p>Актив волонтеров <span class="label-percent">10%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
													<span class="sr-only">10% Complete</span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- END TASKS -->
						</div>
						
						
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
