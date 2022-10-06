@include('document')
@include('head')

<div class="w-1/4 bg-gray-200">

    <div class="w-full" action="filter">
        <ul>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-bold items-center text-gray-700">
                MỨC GIÁ:</li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="<?= $slug ?>?priceFrom=0&priceTo=1000000">DƯỚI 1.000k VNĐ</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="<?= $slug ?>?priceFrom=1000000&priceTo=2000000">1.000k-2.000k VNĐ</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="<?= $slug ?>?priceFrom=2000000&priceTo=3000000">2.000k-3.000k VNĐ</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="<?= $slug ?>?priceFrom=3000000&priceTo=4000000">3.000k-4.000k VNĐ</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="<?= $slug ?>?priceFrom=4000000&priceTo=99000000">TRÊN 4.000k VNĐ</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-bold items-center text-gray-700">
                CHẤT LIỆU:</li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="#">POLYCARBONATE</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="#">VẢI</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="#">VẢI DÙ</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="#">POLYESTER,PE,PVC</a>
            </li>
            <li class="my-1.5 px-1.5 relative border-solid border-l-4 font-medium items-center text-gray-600">
                <a href="#">DA THẬT</a>
            </li>
        </ul>

    </div>

</div>