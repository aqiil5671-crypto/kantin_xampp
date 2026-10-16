<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Pesanan Kantin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h4 class="mb-0">
                        Tambah Pesanan Kantin
                    </h4>

                </div>

                <div class="card-body">

                    <form action="proses.php"
                          method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Pembeli
                            </label>

                            <input type="text"
                                   name="nama_pembeli"
                                   class="form-control"
                                   placeholder="Masukkan nama pembeli"
                                   required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Pilih Menu
                            </label>

                            <select name="nama_menu"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Menu --
                                </option>

                                <option value="Nasi Goreng">
                                    Nasi Goreng - Rp15.000
                                </option>

                                <option value="Mie Goreng">
                                    Mie Goreng - Rp12.000
                                </option>

                                <option value="Ayam Geprek">
                                    Ayam Geprek - Rp15.000
                                </option>

                                <option value="Nasi Ayam">
                                    Nasi Ayam - Rp18.000
                                </option>

                                <option value="Es Teh">
                                    Es Teh - Rp5.000
                                </option>

                                <option value="Jus Jeruk">
                                    Jus Jeruk - Rp8.000
                                </option>

                            </select>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Jumlah Pesanan
                            </label>

                            <input type="number"
                                   name="jumlah"
                                   class="form-control"
                                   min="1"
                                   placeholder="Contoh: 2"
                                   required>

                        </div>


                        <button type="submit"
                                class="btn btn-success w-100 mb-2">

                            Simpan Pesanan

                        </button>


                        <a href="index.php"
                           class="btn btn-secondary w-100">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>