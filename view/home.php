<?php
include_once __DIR__ . "/../repository/products.php";
$product = new products;
$data = $product->getAllInHome();
$row = $data->fetchAll(PDO::FETCH_ASSOC);
if (isset($dataCari) && count($dataCari) > 0) {
  $row = $dataCari;
}
?>

<h1 class="ml-20 text-slate-400 font-light mt-5">Recomendetion Car</h1>
<section class="recomended-car flex flex-row gap-10 p-10 flex-wrap" id="recomended-car">
  <?php foreach ($row as $r) : ?>
    <div class="w-[304px] h-[388px] bg-[#FFFFFF] ml-10 flex-none rounded-lg p-5 group hover:scale-105 duration-75 shadow-xl" id="content-card">
      <button class="float-right mt-1" id="" suka>
        <i class="fa-sharp fa-solid fa-heart fa-lg"></i>
      </button>
      <h1 class="text-2xl font-bold group-hover:scale-105 duration-100"><?= $r["name"] ?></h1>
      <p class="font-light text-slate-400 font-serif group-hover:scale-95 duration-100"><?= $r["kategori"] ?></p>
      <img src="../img/<?= $r["gambar_1"] ?>" alt="" class="mx-auto mt-20 group-hover:scale-110 duration-100">
      <div class="detail flex justify-between mt-4 group-hover:scale-105 duration-100 font-bold">
        <span class="text-slate-400"><i class="fa-solid fa-gas-pump"></i> <?= $r["gasoline"] ?></span>
        <span class="text-slate-400"><i class="fa-solid fa-gas-pump"></i> <?= $r["steering"] ?></span>
        <span class="text-slate-400"><i class="fa-solid fa-gas-pump"></i> <?= $r["person"] ?></span>
      </div>
      <div class="transaksi flex group-hover:scale-105 duration-100">
        <h1 class="text-3xl font-bold mt-7">$<?= $r["harga"] ?>.00/<span class="text-sm font-extrabold text-slate-300">day</span>
        </h1>
        <button class="bg-[#3563E9] text-slate-200 w-24 h-12 rounded-md mt-7 ml-7 hover:-translate-y-2 duration-150 group">
            <span class="font-semibold"><a href="single.php?id=<?= $r["id"] ?>">Rent Now</a></span>
          </button>
      </div>
    </div>
    <!-- akhir  -->
  <?php endforeach; ?>
</section>
<span class="flex mb-4 w-44 h-16 bg-[#3563E9] mx-auto justify-center items-center hover:scale-110 duration-100">
  <a href="kategori.php" class="text-slate-200 font-semibold">Show More Car</a>
</span>