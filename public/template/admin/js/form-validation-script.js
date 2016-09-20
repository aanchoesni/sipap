var Script = function () {

    // $.validator.setDefaults({
    //     submitHandler: function() { alert("submitted!"); }
    // });

    $().ready(function() {
        // validate the comment form when it is submitted
        // $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#jnskomoditis").validate({
            rules: {
                kode: "required",
                nama: "required"
            },
            messages: {
                kode: "Masukkan kode jenis komoditi",
                nama: "Masukkan nama jenis komoditi"
            }
        });

        $("#komoditis").validate({
            rules: {
                kode: "required",
                jenis: "required",
                nama: "required"
            },
            messages: {
                kode: "Masukkan kode komoditi",
                jenis: "Masukkan jenis komoditi",
                nama: "Masukkan nama komoditi"
            }
        });

        $("#kattipas").validate({
            rules: {
                nama: "required"
            },
            messages: {
                nama: "Masukkan nama kategori titik pantau"
            }
        });

        $("#importexcel").validate({
            rules: {
                importexcel: "required"
            },
            messages: {
                importexcel: "Pilih file excel"
            }
        });

        $("#transaksi").validate({
            rules: {
                komoditi: "required",
                asal: "required",
                tujuan : "required",
                aktifitas : "required",
                quantity: {
                    required: true,
                    digits: true
                },
                satuan: "required",
                nilai: {
                    required: true,
                    digits: true
                },
                angkutan: "required",
                titikpantau: "required",
                waktuber: "required",
                waktutiba: "required",
                pelayaran: "required",
                penerima: "required",
            },
            messages: {
                komoditi: "Pilih komoditi",
                asal: "Pilih EMKL asal",
                tujuan : "Pilih EMKL tujuan",
                aktifitas : "Pilih jenis aktifitas",
                quantity: {
                    required: "Masukkan jumlah",
                    digits: "Kode Pos Harus Angka",
                },
                satuan: "Masukkan nama satuan",
                nilai: {
                    required: "Masukkan harga",
                    digits: "Kode Pos Harus Angka",
                },
                angkutan: "Masukkan nama angkutan",
                titikpantau: "Masukkan nama titik pantau",
                waktuber: "Masukkan waktu berangkat",
                waktutiba: "Masukkan waktu tiba",
                pelayaran: "Masukkan mitra pelayaran",
                penerima: "Masukkan mitra bisnis",
            }
        });

        $("#pelayarans").validate({
            rules: {
                nama: "required"
            },
            messages: {
                nama: "Masukkan nama mitra pelayaran"
            }
        });

        $("#penerimas").validate({
            rules: {
                nama: "required",
                alamat: "required",
                kota: "required"
            },
            messages: {
                nama: "Masukkan nama mitra bisnis",
                alamat: "Masukkan alamat mitra bisnis",
                kota: "Masukkan kota mitra bisnis"
            }
        });

        $("#admins").validate({
            rules: {
                jenis: "required",
                first_name: "required",
                email: "required",
                password: "required",
                password_confirmation: "required"
            },
            messages: {
                jenis: "Pilih jenis admin",
                first_name: "Masukkan nama",
                email: "Masukkan email",
                password: "Masukkan password",
                password_confirmation: "Masukkan password confirmation"
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();