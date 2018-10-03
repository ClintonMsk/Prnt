// JavaScript Documentvar selDiv = "";


		
	function handleFileSelect(e) {
		
		if(!e.target.files || !window.FileReader) return;
		var iddata= "";
		//selDiv.innerHTML = "";
		
		var files = e.target.files;
		var filesArr = Array.prototype.slice.call(files);
		console.log(filesArr);
		console.log(filesArr.size);
		filesArr.forEach(function(f) {

			if(!f.type.match("image.*")) {
				return;
			}


			var name = Gentext(10);
			var id = Gentext(5);

			console.log(name+"_"+id);

			var img = new Image();
			var reader = new FileReader();
			reader.onload = function (e) {
				console.log(f);
				var html = "";
				html += "<li class='"+id+"' >";
				html += '<span onclick="closeitem('+"'"+id+"'"+','+"'"+name+"'"+')" ><button></button></span>';
				html += '<input name="gallery[]" type="hidden" id="inputgal"  value="'+name+'"  />';
				html += '<br><div class="thumbnail">';
				html += "<img class='"+id+"_img'  src='image/noimage.jpg'  /></div><br>";
				html += '<div class="pie_progress pie_set pro_'+id+'  " role="progressbar" data-goal="100" aria-valuemin="0" aria-valuemax="100">';
				html += '<span class="pie_progress__number ">0%</span> </div>';
				html += "</li>";
				iddata = "";
				console.log(reader.clientHeight+"_"+reader.clientWidth);
				$("#list_file").append(html);
				Uploadfile(f,name,id);
				e.preventDefault();

			}

			reader.readAsDataURL(f);

		});


	}

	function Gallery_Function(e,append,input_gallery){

		if(!e.files || !window.FileReader) return;
		var iddata= "";
		//selDiv.innerHTML = "";



		var files = e.files;
		var filesArr = Array.prototype.slice.call(files);
		console.log(files.length);



		console.log(files);
			filesArr.forEach(function (f) {

				if (!f.type.match("image.*")) {
					return;
				}
				console.log(f.size);
				console.log(e);
				if(f.size >= 2000000) {
					//$("#"+e.srcElement.id).val("");
					$("#" + append).append("<li><br>ขนาดไฟล์ต้องไม่เกิน 2MB</li>");
					$("#" + append).find("li").css({"font-size":"20px","color":"red"});
				}else {
					$("#" + append).find("li").css({"font-size":"20px","color":"black"});


					var name = Gentext(10);
					var id = Gentext(5);

					console.log(name + "_" + id);

					var img = new Image();
					var reader = new FileReader();
					reader.onload = function (e) {
						console.log(f);
						var html = "";
						html += "<li class='" + id + "' >";
						html += '<span onclick="closeitem(' + "'" + id + "'" + ',' + "'" + name + "'" + ')" ><button></button></span>';
						html += '<input  type="hidden" id="' + input_gallery + '"  value="' + name + '"  />';
						html += '<br><div class="thumbnail_gal">';
						html += "<img class='" + id + "_img'  src='image/noimage.jpg'  /></div><br>";
						html += '<div class="pie_progress pie_set_gal pro_' + id + '  " role="progressbar" data-goal="100" aria-valuemin="0" aria-valuemax="100">';
						html += '<span class="pie_progress__number ">0%</span> </div>';
						html += "</li>";
						iddata = "";
						console.log(reader.clientHeight + "_" + reader.clientWidth);
						$("#" + append).append(html);
						Uploadfile(f, name, id);
						e.preventDefault();

					}


					reader.readAsDataURL(f);
				}

			});

	}

function handleFileSelect_cover(e) {

	if(!e.target.files || !window.FileReader) return;
	var iddata= "";
	//selDiv.innerHTML = "";

	var files = e.target.files;
	var filesArr = Array.prototype.slice.call(files);
	if(filesArr[0].size >= 2000000){
		$("#"+e.srcElement.id).val("");
		$("#list_file_cover").html("<br>ขนาดไฟล์ต้องไม่เกิน 2MB");
		$("#list_file_cover").css({"font-size":"20px","color":"red"});

	}else {
		$("#list_file_cover").css({"font-size":"20px","color":"black"});
		filesArr.forEach(function (f) {

			if (!f.type.match("image.*")) {
				return;
			}


			var name = Gentext(10);
			var id = Gentext(5);

			console.log(name + "_" + id);

			var img = new Image();
			var reader = new FileReader();
			reader.onload = function (e) {
				console.log(f);
				var html = "";
				html += "<li class='" + id + "' >";
				html += '<span onclick="closeitem(' + "'" + id + "'" + ',' + "'" + name + "'" + ')" ><button></button></span>';
				html += '<input name="cover" type="hidden"  id="cover" value="' + name + '"  />';
				html += '<br><div class="thumbnail_cover">';
				html += "<img class='" + id + "_img' src='"+url+"image/noimage.jpg'  /></div><br>";
				html += '<div class="pie_progress pie_set_cover pro_' + id + '  " role="progressbar" data-goal="100" aria-valuemin="0" aria-valuemax="100">';
				html += '<span class="pie_progress__number ">0%</span> </div>';
				html += "</li>";
				iddata = "";
				console.log(reader.clientHeight + "_" + reader.clientWidth);
				$("#list_file_cover").html(html);
				Uploadfile(f, name, id);
				e.preventDefault();

			}

			reader.readAsDataURL(f);

		});
	}


}

function handleFileSelect_banner(e) {

    if(!e.target.files || !window.FileReader) return;
    var iddata= "";
    //selDiv.innerHTML = "";

    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);

    if(filesArr[0].size >= 2000000){
        $("#"+e.srcElement.id).val("");
        $("#list_file_banner").html("<br>ขนาดไฟล์ต้องไม่เกิน 2MB");
        $("#list_file_banner").css({"font-size":"20px","color":"red"});

    }else {
        $("#list_file_banner").css({"font-size":"20px","color":"black"});
        filesArr.forEach(function (f) {

            if (!f.type.match("image.*")) {
                return;
            }


            var name = Gentext(10);
            var id = Gentext(5);

            console.log(name + "_" + id);

            var img = new Image();
            var reader = new FileReader();
            reader.onload = function (e) {
                console.log(f);
                var html = "";
                html += "<li class='" + id + "' >";
                html += '<span onclick="closeitem(' + "'" + id + "'" + ',' + "'" + name + "'" + ')" ><button></button></span>';
                html += '<input name="cover" type="hidden"  id="cover" value="' + name + '"  />';
                html += '<br><div class="banner_cover">';
                html += "<img class='" + id + "_img' src='"+url+"image/noimage.jpg'  /></div><br>";
                html += '<div class="pie_progress pie_set_banner pro_' + id + '  " role="progressbar" data-goal="100" aria-valuemin="0" aria-valuemax="100">';
                html += '<span class="pie_progress__number number_banner_percen">0%</span> </div>';
                html += "</li>";
                iddata = "";
                console.log(reader.clientHeight + "_" + reader.clientWidth);
                $("#list_file_banner").html(html);
                Uploadfile(f, name, id);
                e.preventDefault();

            }

            reader.readAsDataURL(f);

        });
    }


}

function Uploadfile(datainput,name,id_progress) {
		iddata = id_progress;
		console.log("Class_name:" + iddata);
		var form_data = new FormData();
		form_data.append("file", datainput);
		form_data.append("name_file", name);
    	form_data.append("_token", token);
		Set_Progress(iddata);
		//$('.pro_'+iddata).asPieProgress('go', '50%');



		$.ajax({
			url:url+"/Post",
			dataType: 'script',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post', headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			xhr: function () {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) {
					myXhr.upload.addEventListener('progress', progress, false);
					console.log(myXhr.upload);

					myXhr.addEventListener("progress",function(pro){

						var max = pro.total;
						var current = pro.loaded;
						var Percentage = (current * 100)/max;
                        //console.log(Percentage);
						$('.pro_'+id_progress).asPieProgress('go',Percentage);

					});

				}
				return myXhr;
			},
			cache: false,
			contentType: false,
			processData: false,

			success: function (datas) {
				var data_j = JSON.parse(datas);
				$("."+id_progress).addClass("success");
				console.log("Data"+data_j);
				//$('.pro_'+id_progress).asPieProgress('go',"100%");
				//alert("OK");
				$("."+id_progress+"_img*").fadeOut(function() {
					$(this).attr("src",data_j.src).fadeIn(1000);
					$(".pro_"+id_progress+"*").fadeOut(1000);
				});


				var img_w =  data_j.width;
				var img_h =  data_j.height;

				console.log(img_w);
				console.log(img_h);

				if(img_h >  img_w ){
					$("."+id_progress+"_img").addClass("portrait");
				}else{

				}



			},

			error: function (data) {
				console.log(data);
			}

		});

	}

	function progress(e){

		if(e.lengthComputable){
			var max = e.total;
			var current = e.loaded;

			var Percentage = (current * 100)/max;
			//console.log(Percentage);
			//Set_Progress(iddata);
			//$('.pro_'+iddata).asPieProgress('go',Percentage);
			//console.log("Percent:"+Percentage+"Class:"+iddata);
			if(Percentage >= 100)
			{
				// process completed
			}
		}
	}



	function closeitem (list_class,name_file){




        form_data = new FormData();

        form_data.append("name_file_del",name_file);


        $.ajax({
            url:url+"/DeleteUpload",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post', headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                if(data == 1){
                    $("."+list_class).fadeOut(1000,function(){
                        $("."+list_class).remove();
                    });
                }else{

				}

            },

            error: function (data) {

            }

        });


	}


	function deletetimage (path,list_class){




    form_data = new FormData();

    form_data.append("path",path);


    $.ajax({
        url:url+"/Deletetimage",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post', headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            if(data == 1){
                $("."+list_class).fadeOut(1000,function(){
                    $("."+list_class).remove();
                });
            }else{

            }

        },

        error: function (data) {

        }

    });


}




function Set_Progress (class_input) {
		console.log("Set_Class"+iddata);
		$('.pro_'+class_input).asPieProgress({

			namespace: 'pie_progress'
		});
		// Example with grater loading time - loads longer
		$('.pie_progress--slow').asPieProgress({
			namespace: 'pie_progress',
			goal: 100,
			min: 0,
			max: 100,
			speed: 200,
			trackcolor: '#7FFF00',
			easing: 'linear'
		});
		// Example with grater loading time - loads longer
		$('.pie_progress--countdown').asPieProgress({
			namespace: 'pie_progress',
			easing: 'linear',
			first: 120,
			max: 120,
			trackcolor: '#7FFF00',
			goal: 0,
			speed: 50, // 120 s * 1000 ms per s / 100
			numberCallback: function(n) {
				var minutes = Math.floor(this.now / 60);
				var seconds = this.now % 60;
				if (seconds < 10) {
					seconds = '0' + seconds;
				}
				return minutes + ': ' + seconds;
			}
		});

}

function delete_file_cover(cover,filename){

    $.post(url+"Post",{"filename":filename,"coverdel":"true"},function(data){
		if(data == 1){
			$("."+cover).fadeOut(500,function(){
				$("."+cover).remove();
			});

		}

    });

}



function delete_file_gal(code,tbname,field,value,path){

	$.post(url+"Post",{"code":code,"tbname":tbname,"field":field,"value":value,"path":path,"galdel":"true"},function(data){
		if(data == 1){
			$("."+code).fadeOut(500,function(){
				$("."+code).remove();
			});

		}

	});

}



function delete_cover(code,path){

	$.post(url+"Post",{"path":path,"aldel":"true"},function(data){
		if(data == 1){
				$(".cover_thumb").attr("src","image/noimage.jpg");
		}

	});

}


function delete_icon(code,path){

	$.post(url+"Post",{"path":path,"del_icon":"true"},function(data){
		if(data == 1){
				$(".cover_thumb").attr("src","image/noimage.jpg");
		}

	});

}




function del_room_delete(class_room){
	$("."+class_room).fadeOut(function(){
		$("."+class_room).remove();

	});
}


function delete_room(filename){

	$.post("../../post.php",{"filename":filename,"del_room":"true"},function(data){
		if(data == 1){
		$("."+filename).attr("src","image/noimage.jpg");
		}

	});
}

















