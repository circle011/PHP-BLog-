    <script src="<?php echo KAYNAK; ?>yonetici/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo KAYNAK; ?>yonetici/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo KAYNAK; ?>yonetici/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo KAYNAK; ?>yonetici/assets/js/off-canvas.js"></script>
    <script src="<?php echo KAYNAK; ?>yonetici/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo KAYNAK; ?>yonetici/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo KAYNAK; ?>yonetici/assets/js/dashboard.js"></script>
    <script src="<?php echo KAYNAK; ?>yonetici/assets/js/todolist.js"></script>
    <script src="<?php echo KAYNAK; ?>yonetici/assets/js/ozeljqueryvalidate.js"></script>

    <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script> -->
    <!-- End custom js for this page -->
    <script src="<?php echo KAYNAK ?>yonetici/assets/js/file-upload.js"></script>
    <script>
      anadizintam = "http://localhost/basitegitim/";
      console.log("test");
      $(document).ready(function() {
        $('#giris_form').validate({
          rules: {
            kuladi: {
              required: true,

            },
            sifre: {
              required: true,

            }
          },


          submitHandler: function(form) {

            var formcu = ($("#giris_form").serialize());
            $.post(anadizintam + "postlar/giris_yap", {
              form_veri: formcu
            }, function(data) {
              console.log('form verisis::', data);
              if (data.islem == "kul_yok") {
                alert("kullanıcı olmadığı için işlem yapılamaz");
              } else if (data.islem == "sifre") {
                alert("sifreniz doğru değil");
              } else if (data.islem == "giris") {
                //alert("giris basarılı");
                location.reload();
              }
            }, "JSON");
          }

        });

        $('#blog_yeni_yazi').validate({
          rules: {
            baslik: {
              required: true,
            },
            k_baslik: {
              required: true,
            },
            kategori: {
              required: true,
            },
            durum: {
              required: true,
            },
            icerik: {
              required: true,
            }
          },

          submitHandler: function(form) {


            var formData = new FormData();
            $.each($(".dosyaci"), function(i) {
              formData.append('files[]', $(".dosyaci")[i].files[0]);
            });
            var formcu = ($("#blog_yeni_yazi").serialize());
            formData.append('formcu', formcu);
            $.ajax({
              url: anadizintam + "postlar/yeni_blog_ekle",
              dataType: 'text',
              ceach: false,
              contentType: false,
              processData: false,
              data: formData,
              type: 'post',
              dataType: 'json',
              success: function(data) {
                if (data.islem == "basarili") {
                  location.href = anadizintam + "yonetici/yazılarım/" + data.id;
                }
              },
              error: function(data) {
                alert("Hata");
                console.log(data);
              }
            });
          }


        });
        $('#blog_yeni_yazi_guncelle').validate({
          rules: {
            baslik: {
              required: true,
            },
            k_baslik: {
              required: true,
            },
            kategori: {
              required: true,
            },
            durum: {
              required: true,
            },
            icerik: {
              required: true,
            }
          },

          submitHandler: function(form) {


            var formData = new FormData();
            $.each($(".dosyaci"), function(i) {
              formData.append('files[]', $(".dosyaci")[i].files[0]);
            });
            var formcu = ($("#blog_yeni_yazi_guncelle").serialize());
            formData.append('formcu', formcu);
            $.ajax({
              url: anadizintam + "postlar/yeni_blog_ekle_guncelle",
              dataType: 'text',
              ceach: false,
              contentType: false,
              processData: false,
              data: formData,
              type: 'post',
              dataType: 'json',
              success: function(data) {
                if (data.islem == "basarili") {
                  location.href = anadizintam + "yonetici/yazilarim/" + data.id;
                }
              },
              error: function(data) {
                alert("Hata");
                console.log(data);
              }
            });
          }


        });

      });
      $('#yeni_proje_yazi').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#yeni_proje_yazi").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/yeni_proje_ekle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/projelerim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });
      $('#proje_guncelle').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#proje_guncelle").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/yeni_proje_yazi_guncelle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/projelerim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });

      $('#yeni_hayal_yazi').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#yeni_hayal_yazi").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/yeni_hayal_ekle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/hayallerim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });
      $('#hayal_guncelle').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#hayal_guncelle").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/hayal_guncelle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/hayallerim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });

      $('#yeni_amac_yazi').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#yeni_amac_yazi").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/yeni_amac_ekle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/amaclarim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });
      $('#amac_guncelle').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#amac_guncelle").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/amac_guncelle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/amaclarim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });

      $('#yeni_ideal_yazi').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#yeni_ideal_yazi").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/yeni_ideal_ekle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/ideallerim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });

      $('#ideal_guncelle').validate({
        rules: {
          baslik: {
            required: true,
          },
          k_baslik: {
            required: true,
          },
          kategori: {
            required: true,
          },
          durum: {
            required: true,
          },
          icerik: {
            required: true,
          }
        },

        submitHandler: function(form) {


          var formData = new FormData();
          $.each($(".dosyaci"), function(i) {
            formData.append('files[]', $(".dosyaci")[i].files[0]);
          });
          var formcu = ($("#ideal_guncelle").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/ideal_guncelle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/ideallerim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });
        }


      });

      var formcu = ($("#ideal_guncelle").serialize());
          formData.append('formcu', formcu);
          $.ajax({
            url: anadizintam + "postlar/ideal_guncelle",
            dataType: 'text',
            ceach: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            dataType: 'json',
            success: function(data) {
              if (data.islem == "basarili") {
                location.href = anadizintam + "yonetici/ideallerim/" + data.id;
              }
            },
            error: function(data) {
              alert("Hata");
              console.log(data);
            }
          });



      var formData = new FormData();
      $("#ekle").on("click", function() {
        var yorum = $("#yorum").serialize();
        $.ajax({
          url: anadizintam + "postlar/yeni_yorum_ekle",
          type: "POST",
          data: yorum,
          dataType: "JSON",
          success: function(yorum) {
            alert("yorum yapıldu");
          }


        });
      });
    </script>
    </body>

    </html>