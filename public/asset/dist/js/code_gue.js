
        // table karyawan
        $(function() {
            $("#blmada").DataTable({
                "responsive": true,
                "autoWidth": false,
                "autoWidth": false,
            });
            $("#proses").DataTable({

                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": true,
                "scrollY": 150,
                "paging": true,
                dom: 'Bfrtip',
                buttons: [{
                    text: 'Process karyawan',
                    action: function() {
                        window.location.href = "/detailproses"
                    }
                }]
            });
           
            
           
            $("#user").DataTable({

                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": true,
                "scrollY": 300,
                "paging": true,
                dom: 'Bfrtip',
                buttons: [{
                    text: 'Create User',
                    action: function() {
                        window.location.href = "/user/tambah"
                    }
                }]
            });
           
            
           
        });

        
        // function logConfirm(url) {
        //     $('#btn-log').attr('href', url);
        //     $('#logoutmodal').modal();
        // }

      
        $('.custom-file-input').on('change', function() {
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        })      
           
        // delete confim
        // function deleteConfirm(url) {
        //     // $('#btn-delete').attr('href', url);
        //     $('#deleteModal').modal();
        // }
        