
$(document).ready(function(){
    $('#sideBarNav').hide();
    $('#sideBarBtn').on('click',function(){
        // alert("ok");
        $('#sideBarNav').toggle();
        // $('body').width("65%");
    });

    showdata();
    cartnoti();
    costnoti();


// discountitem
    $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
// end discountitem

// brand
$('.brand-carousel').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  responsive:{
    0:{
      items:1
    },
    600:{
      items:3
    },
    1000:{
      items:5
    }
  }
}) 
// end brand

// modal
    $('.ItemDetailIcon').on('click',function(){
        // alert('ok');
        $('#ItemDetailModal').modal('show');
    })
// end modal

// submenu
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass('show');


      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });


      return false;
    });
// end submenu


// Add to cart btn
    $('.AddToCartBtn').on('click',function(){
        // alert("ok");
        var id = $(this).data('id');
        var name = $(this).data('name');
        var photo = $(this).data('photo');
        var price = $(this).data('price');
        var discount = $(this).data('discount');
        var qty = 1;
        console.log(id);
        var item = {
            id: id,
            name: name,
            price: price,
            photo: photo,
            qty: qty,
            discount: discount
        };
        // console.log(item);

    var storagedata = localStorage.getItem("itemlist");
    var itemarray;

    var check = false;
    if (!storagedata) {
        itemarray = [];
    }else{
    itemarray = JSON.parse(storagedata);
    }

        var check = false;
        itemarray.forEach( function(v, i) {
            // console.log(v.id);
            if(id == v.id){
                v.qty++;
                check = true;
            }
        });
            if (check==false) {
                itemarray.push(item);
            }

        var storagestring = JSON.stringify(itemarray);
        localStorage.setItem("itemlist", storagestring);
        showdata();
        cartnoti();
        costnoti();
    })
// end add to cart btn

// show item in table
    function showdata(){
        localdata = localStorage.getItem('itemlist');
        itemarray = JSON.parse(localdata);
        var html='';
        var j = 1;
        var subtotal = 0;
        var total = 0
        itemarray.forEach( function(v, i) {
            subtotal=v.qty*v.price;
            total+=subtotal;
            html+=`
                    <tr>
                        <td><button class="btn btn-outline-danger rounded-circle delBtn" data-id="${i}"><i class="fas fa-times"></i></button></td>
                        <td>${j++}</td>
                        <td><img src="${v.photo}" width="150" height="150"></td>
                        <td>${v.name}</td>
                        <td>${v.price}</td>
                        <td>
                            <button class="btn btn-secondary btn-sm increaseBtn" data-id="${i}">+</button>
                            ${v.qty}
                            <button class="btn btn-secondary btn-sm decreaseBtn" data-id="${i}">-</button>
                        </td>
                        <td>${subtotal} Ks</td>
                    </tr>
            `
        });
            html+=`
                    <tr>
                        <td colspan="6"><h4>Total</h4></td>
                        <td>${total} Ks</td>
                    </tr>
            `
        $('.mytbody').html(html);
    }
// end show item in table
    
// increaseBtn
    $('tbody').on('click','.increaseBtn',function(){
        // alert("ok");
        var id = $(this).data('id');
        // console.log(id);
        localdata = localStorage.getItem('itemlist');

        if (localdata) {
            itemarray = JSON.parse(localdata);

            itemarray.forEach( function(v, i) {
                // console.log(i);
                if(id==i){
                    v.qty++;
                }
            });
            var itemstring = JSON.stringify(itemarray);
            localStorage.setItem('itemlist', itemstring);
            showdata();cartnoti();costnoti()

        }        
    })
// edn increaseBtn

// decreaseBtn
    $('tbody').on('click','.decreaseBtn',function(){
        // alert("ok");
        var id = $(this).data('id');
        // console.log(id);
        localdata = localStorage.getItem('itemlist');

        if (localdata) {
            itemarray = JSON.parse(localdata);

            itemarray.forEach( function(v, i) {
                // console.log(i);
                if(id==i){
                    v.qty--;
                    if (v.qty==0) {
                        if (confirm("Are you sure to delete?")) {
                             itemarray.splice(id, 1);
                         }else{
                            v.qty++;
                         }
                       
                    }
                }
            });
            var itemstring = JSON.stringify(itemarray);
            localStorage.setItem('itemlist', itemstring);
            showdata();cartnoti();costnoti()

        }        
    })
// edn decreaseBtn


// del btn
    $('tbody').on('click','.delBtn',function(){
        var id = $(this).data('id');

        var localdata = localStorage.getItem("itemlist");

        if (localdata) {
            itemarray = JSON.parse(localdata);
            itemarray.forEach( function(v, i) {
                if(id==i){
                    if (confirm("Are you sure to delete?")) {}
                    itemarray.splice(id, 1);
                }
            });
            itemstring = JSON.stringify(itemarray);
            localStorage.setItem("itemlist", itemstring);
            showdata();cartnoti();costnoti()

        }
    })
// end del btn

// cartnoti
    function cartnoti(){
        var localdata = localStorage.getItem("itemlist");
        var total = 0;
        if (localdata) {
            itemarray = JSON.parse(localdata);
            itemarray.forEach( function(v, i) {
                total+=v.qty;
            });
            $('.itemCount').html(total);
        }
    }
// end cartnoti

// cost noti
    function costnoti(){
        var localdata = localStorage.getItem("itemlist");
        var total = 0;
        if (localdata) {
            itemarray = JSON.parse(localdata);
            itemarray.forEach( function(v, i) {
                total+=v.qty*v.price;
            });
            $('.costNoti').html(total+" "+" Ks");
        }
    }
// end costnoti


});
// end ready function
