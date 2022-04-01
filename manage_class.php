<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="css/index.css">

	<title>Class room</title>

	<style>
		.nav-bar {
			background-color: var(--primary);
			border-bottom: 1px solid var(--blue-ocean);
		}

		.box-profile {
			width: 1076px;

			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);

			margin-left: auto;
			margin-right: auto;
			margin-top: 8px;
			padding: 8px;
		}

		.group-edit {
			align-self: end;
		}

		.edit-button {
			width: 42px;
			color: #fff;
			font-size: 13px;
		}

		.btn-edit-photo {
			width: 98px;
			color: #fff;
			font-size: 13px;
		}

		.box-infomation-author {
			margin-top: 198px;
		}

		.box-img-profile {
			margin-left: 38px;
		}

		.box-subject {
			margin-left: 50px;
		}

		.box-author {
			align-self: end;
		}

		.drop-down-edit {
			position: relative;
		}

		.group-drop-down-edit {
			visibility: hidden;

			position: absolute;
			margin-top: 8px;
			margin-left: -50px;
			width: 67px;
			background-color: var(--gray-cement);
		}

		.drop-down-text {
			font-size: 10px;
			color: #fff;
			padding: 4px;
			text-align: right;
		}

		.author {
			font-size: var(--font-14);
			color: #fff;
			margin-top: 27px;
		}

		.box-create-post {
			width: 943px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.box-menu-bar{
			width: 334px;
			margin-left: 107px;
		}

		.box-content {
			margin-top: 8px;
			position: relative;
		}

		.box-create-post-header {
			padding: 16px;
			border-bottom: 1px solid var(--blue-ocean);
		}

		.box-author-post {
			margin-left: 14px;
		}

		.create-post-author {
			font-size: 16px;
			font-weight: 700;
			color: #fff;
		}

		.create-post-datetime {
			font-size: 10px;
			font-weight: 300;
			color: var(--gray-cement);
		}

		.box-create-post-body {
			margin: 21px 72px 0px 72px;
		}

		.box-create-post-footer {
			margin: 10px 72px;
		}

		textarea {
			border:1px solid #999999;
			width:100%;
			margin:5px 0;
			padding:3px;
			align-content: left;
		}

		.file-name {
			font-size: 13px;
			font-weight: 300;
			color: #fff;
		}

		.btn-add-file {
			width: 100px;
			color: #fff;
		}

		.btn-send {
			width: 100px;
			margin-left: 16px;
			color: #fff;
		}


		/* Display post */
		.box-display-post {
			margin: 8px 0;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.box-display-post-header {
			padding: 16px;
			border-bottom: 1px solid var(--blue-ocean);
		}

		.box-author-post {
			margin-left: 14px;
		}

		.display-post-author {
			font-size: 16px;
			font-weight: 700;
			color: #fff;
		}

		.display-post-datetime {
			font-size: 10px;
			font-weight: 300;
			color: var(--gray-cement);
		}

		.box-display-post-body {
			margin: 20px 72px 0 72px;
		}

		.post-detail {
			font-size: 16px;
			font-weight: 300;
			color: #fff;
		}

		.file-detail {
			margin-top: 8px;
			margin-bottom: 38px;
			width: 262px;
			padding: 8px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.file-detail-name {
			width: 262px;
			text-overflow: ellipsis;
			white-space: nowrap;
			font-size: 16px;
			font-weight: 300;
			color: #fff;
		}

		.file-detail-extension {
			font-size: 10px;
			font-weight: 300;
			color: var(--gray-cement);
		}

		.line {
			width: 100%;
			height: 1px;
			background-color: var(--blue-ocean);
		}

		.box-display-add-comment {
			margin: 8px 72px 0 72px;
		}

		.field-comments,
		.field-comments::-webkit-input-placeholder {
			font-size: 16px;
			padding: 4px;
			background-color: var(--gray-cement);
		}

		.btn-comment {
			margin-left: 11px;
		}

		.total-comments {
			font-size: 16px;
			font-weight: 300;
			color: var(--gray-cement);
		}

		.box-display-comments {
			width: 100%;
			padding: 8px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
			margin-bottom: 8px;
		}

		.box-display-comment-header {
			padding: 16px;
			border-bottom: 1px solid var(--blue-ocean);
		}

		.box-author-comment {
			margin-left: 14px;
		}

		.display-comment-author {
			font-size: 16px;
			font-weight: 700;
			color: #fff;
		}

		.display-comment-datetime {
			font-size: 7px;
			font-weight: 300;
			color: var(--gray-cement);
			margin-left: 8px;
		}

		.comment-message {
			font-size: 10px;
			font-weight: 300;
			color: #fff;
		}

		.box-classwork-work {
			width: 334px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.title-classwork-work {
			margin-top: 16px;
			font-size: 24px;
			font-weight: 700;
			color: #fff;
		}

		.classwork-item {
			margin-top: 16px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
			border-radius: 4px;
			margin-left: 16px;
			margin-right: 16px;
			padding: 8px;
		}

		.classwork-desc {
			width: 191px;
			text-overflow: ellipsis;
			white-space: nowrap;
			font-size: 13px;
			font-weight: 300;
			color: #fff;
		}

		.classwork-datetime {
			font-size: 10px;
			font-weight: 300;
			color: var(--gray-cement);
		}

		.btn-all-class-work {
			width: 129px;
			font-size: 13px;
			font-weight: 700;
			color: #fff;
			padding: 8px;
		}

		.btn-create-work {
			width: 129px;
			font-size: 13px;
			font-weight: 700;
			color: #fff;
			padding: 8px;
		}

		.btn-group-classwork-work {
			margin-top: 8px;
			margin-left: 16px;
			margin-right: 16px;
			margin-bottom: 8px;
		}

		.title-classwork-member {
			margin-top: 16px;
			font-size: 24px;
			font-weight: 700;
			color: #fff;
		}

		.member-name {
			margin-left: 16px;
			font-size: 16px;
			font-weight: 700;
			color: #fff;
		}

		.box-classwork-member {
			width: 334px;
			margin-top: 16px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.classwork-member-item {
			margin: 8px 16px;
		}


		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			width: 636px;
			background-color: var(--primary);
			margin: auto;
			padding: 20px;
			border: 1px solid var(--blue-ocean);
		}

		.modal-title {
			font-size: 32px;
			font-weight: 700;
			color: #fff;
		}

		.modal-field {
			font-size: 16px;
			padding: 4px;
			margin-top: 8px;
		}

		.btn-update {
			width: 174px;
			margin-top: 12px;
			color: #fff;
		}

		.btn-cancel {
			width: 174px;
			margin-top: 12px;
			color: #fff;
		}

		/** Menu bar */
		.menubar {
			width: 379px;
			height: 100%;
			padding: 16px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
			position: fixed;
			transform: translate(-10000px, 0px);
			top: 0;
		}

		.text-name {
			font-size: 20px;
			font-weight: 700;
			color: #fff;
		}

		.line {
			width: 100%;
			height: 1px;
			background-color: var(--blue-ocean);
		}

		.text-title {
			margin-top: 16px;
			font-size: 20px;
			font-weight: 700;
			color: #B5C4D3;
		}

		.card-items {
			margin-top: 8px;
		}

		.subject-code-sidebar {
			font-size: 16px;
			font-weight: 700;
			color: #B5C4D3;
			margin-left: 8px;
		}

		.subject-name-sidebar {
			width: 199px;
			font-size: 16px;
			font-weight: 700;
			color: #B5C4D3;
			margin-left: 8px
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;
		}
	</style>

</head>
<body>
	<div class="container-content">
		<div class="d-flex text-center nav-bar">
			<div id="showSidebar" class="show-sidebar justify-content-center align-items-center align-self-center ml-2">
				<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32"/>
			</div>
			<div class="flex-grow-1 text-nav-bar">Classroom</div>
		</div>
		<div class="d-flex flex-column box-profile">
			<div class="d-flex flex-grow-1 group-edit">
				<button class="main-button edit-button text-center">edit</button>
				<div class="drop-down-edit" id="show-drop-down">
					<img src="imgs/menu_dots_vertical_free_icon_font.png" width="19" height="19"/>
					<div class="d-flex flex-column group-drop-down-edit">
						<div class="drop-down-text" id="dd-edit">edit class</div>
						<div class="drop-down-text" id="dd-delete">delete class</div>
					</div>
				</div>
			</div>
			<div class="d-flex box-infomation-author">
				<div class="d-flex flex-column align-items-center box-img-profile">
					<div class="img-profile">
						<img class="profile image-fit-width" src="imgs/circle.png" width="131" height="131"/>
					</div>
					<button class="main-button btn-edit-photo text-center">edit photo</button>
				</div>
				<div class="d-flex flex-column box-subject">
					<div class="text-title-code-subject text-header">
						935432
					</div>
					<div class="text-desc-code-subject text-header">
						Introduction to e-Business
					</div>
				</div>
			</div>
			<div class="d-flex flex-grow-1 box-author">
					<div class="author">author</div>
				</div>
		</div>
		<div class="d-flex flex-grow-1 justify-content-center align-items-start box-content">
			<div class="d-flex flex-column box-timeline">
					 <!-- Create post -->
					<div class="d-flex flex-column box-create-post">
						<div class="d-flex box-create-post-header">
							<div class="img-profile">
								<img class="profile image-fit-width" src="imgs/circle.png" width="37" height="37"/>
							</div>
							<div class="d-flex flex-column box-author-post">
								<div class="create-post-author">
									Kanda Sorn-in
								</div>
								<div class="create-post-datetime">
									Aug 5, 2020
								</div>
							</div>
						</div>
						<div class="d-flex box-create-post-body">
						<textarea rows="4">what’s happen?</textarea>
						</div>
						<div class="d-flex justify-content-between box-create-post-footer">
								<div class="file-name">
									แผนการสอน-แบบประมวลราย...แผนการสอน-แบบประมวลราย...แผนการสอน-แบบประมวลราย...
								</div>
								<div class="d-flex">
									<div class="btn-add-file main-button-outline text-center">+add file</div>
									<div class="btn-send main-button text-center">Send</div>
								</div>
						</div>
					</div>

					<!-- Display post -->
					<div class="d-flex flex-column box-display-post">
						<div class="d-flex box-display-post-header">
							<div class="img-profile">
								<img class="profile image-fit-width" src="imgs/circle.png" width="37" height="37"/>
							</div>
							<div class="d-flex flex-column box-author-post">
								<div class="display-post-author">
									Kanda Sorn-in
								</div>
								<div class="display-post-datetime">
									Aug 5, 2020
								</div>
							</div>
						</div>
						<div class="d-flex flex-column box-display-post-body">
							<div class="post-detail">
								แบบประมวลรายวิชา(Course Syllabus)
								รหัสวิชา 935432 ธุรกิจอิเล็กทรอนิกส์ขั้นแนะนำ (INTRODUCTION TO E-BUSINEES)
							</div>
							<div class="d-flex flex-column file-detail">
								<div class="file-detail-name">แผนการสอน-แบบประมวลราย...</div>
								<div class="file-detail-extension">PDF</div>
							</div>
						</div>
						<div class="line"></div>
						<div class="box-display-add-comment">
							<div class="d-flex">
									<input class="input-field field-comments" placeholder="comment"/>
									<div class="btn-comment">
										<img src="imgs/paper_plane_free_icon_font.png" width="28" height="28"/>
									</div>
							</div>
							<div class="total-comments">
									6 comments
							</div>
							<div class="d-flex">
								<div class="d-flex box-display-comments">
									<div class="img-profile">
										<img class="profile image-fit-width" src="imgs/circle.png" width="37" height="37"/>
									</div>
									<div class="d-flex flex-column box-author-comment">
										<div class="d-flex">
											<div class="align-self-center display-comment-author">
												Kanda Sorn-in
											</div>
											<div class="align-self-center display-comment-datetime">
												Aug 5, 2020
											</div>
										</div>
										<div class="comment-message">
											hello my name is cahtchai prathammate project class room i’m live in udon
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="d-flex flex-column box-menu-bar">
				<div class="text-center box-classwork-work">
					<div class="title-classwork-work">Classwork</div>
					<div class="d-flex justify-content-between align-items-center classwork-item">
						<div class="classwork-desc">(งานกลุ่ม 3 คน) project 25 คะแน...</div>
						<div class="classwork-datetime">Aug 5, 2020</div>
					</div>
					<div class="d-flex justify-content-between btn-group-classwork-work">
							<div class="btn-all-class-work main-button-outline text-center">All class work</div>
							<div class="btn-create-work main-button text-center">Create work</div>
						</div>
				</div>
				<div class="text-center box-classwork-member">
					<div class="title-classwork-member">Classwork</div>
					<div class="d-flex align-items-center classwork-member-item">
						<div class="img-profile">
							<img class="profile image-fit-width" src="imgs/circle.png" width="37" height="37"/>
						</div>
						<div class="member-name">
							chatchai prathammate1
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-title text-center">
				EDIT CLASS
			</div>
			<div class="mt-2"></div>
			<div class="d-flex flex-column align-items-center">
				<input class="input-field modal-field field-introduction" placeholder="Introduction to e-Business"/>
				<input class="input-field modal-field field-code" placeholder="095432"/>
				<input class="input-field modal-field field-room" placeholder="Room (not required)"/>
				<input type="submit" class="main-button btn-update" value="update"/>
				<input type="submit" class="main-button-outline btn-cancel" id="btn-cancel" value="cancel"/>
			</div>
		</div>
	</div>

	<div class="d-flex flex-column menubar">
		<div id="hideSidebar" class="hide-sidebar align-self-end">
			<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32"/>
		</div>
		<div class="img-profile align-self-center">
			<img class="profile image-fit-width" src="imgs/circle.png" width="106" height="106"/>
		</div>
		<div class="text-name align-self-center">
			chatchai prathammate
		</div>
		<div class="line mt-2"></div>
		<div class="text-title">
			My classroom
		</div>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42"/>
			</div>
			<div class="subject-code-sidebar">
				935 342
			</div>
			<div class="subject-name-sidebar">
				my classroom 101my classroom 101my classroom 101my classroom 101my classroom 101
			</div>
		</div>
		<div class="text-title">
			Enrolled
		</div>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42"/>
			</div>
			<div class="subject-code-sidebar">
				935 342
			</div>
			<div class="subject-name-sidebar">
				my classroom 101my classroom 101my classroom 101my classroom 101my classroom 101
			</div>
		</div>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42"/>
			</div>
			<div class="subject-code-sidebar">
				935 342
			</div>
			<div class="subject-name-sidebar">
				my classroom 101my classroom 101my classroom 101my classroom 101my classroom 101
			</div>
		</div>
	</div>
	<script>
		var isShow = false;
		$("#show-drop-down").click(function() {
			if(!isShow) {
				$('.group-drop-down-edit').css('visibility', 'visible');
			}
			else {
				$('.group-drop-down-edit').css('visibility', 'hidden');
			}

			isShow = !isShow;
		});

		$("#dd-edit").click(function() {
			$('.modal').css('display', 'block');
		});

		$("#btn-cancel").click(function() {
			$('.modal').css('display', 'none');
		});

		$("#dd-delete").click(function() {
			console.log("delete");
		});
	</script>

	<script>
		$("#showSidebar").click(function() {
			$('.menubar').css('transform', 'translate(0px, 0px)');
		});

		$("#hideSidebar").click(function() {
			$('.menubar').css('transform', 'translate(-10000px, 0px)');
		});
	</script>
</body>
</html>