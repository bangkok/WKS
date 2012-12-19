
/*
$(document).ready(function(){
    $('img[@src$=.png]').ifixpng();
  //  $('.display_on_').toggleClass("display_off");

    $(".gtega").fancybox();
    $('a.media').media();
    $(".gtega").fancybox({
        'zoomSpeedIn':  0, 
        'zoomSpeedOut': 0, 
        'overlayShow':  true,
        'allowScriptAccess': always,
        'autostart':true,
        'allowFullScreen':true
      });

    //$('a.media').media();

//    display('comments');
  });
	 */
//---- Kapcha -----------
function captchaJ() {$('#captchaI').attr('src', '/auth/captcha/' + Math.round((Math.random() * (100 - 1))) );} 
//---- Kapcha -----------
function test(id){
//alert(a);
p=({id:id});
     doLoadH('test', 'test', p ); // id func(ajax) ����T����-���- 
return false;
}

function sdf_FTS(_number,_decimal,_separator)
// ���������: ����������� ����� � ������ ������� 1_separator000_separator000._decimal
// ���������� ����������� ��� Float To String
// _number - ����� �����, ����� ��� ������� �� �����
// _decimal - ����� ������ ����� �������
// _separator - ����������� ��������
{
// ����������, ���������� ������ ����� �����, �� ��������� ������������ 2 �����
var decimal=(typeof(_decimal)!='undefined')?_decimal:2;

// ����������, ����� ����� ��������� [�� �� �����������] ����� ���������
var separator=(typeof(_separator)!='undefined')?_separator:'';

// ��������������� �������� �������� � �������� �����, �� ���� ������, ���� �����
// �������� �������� ����� �� ����������
var r=parseFloat(_number)

// ��� ��� � javascript ��� ������� ��� �������� ������� ����� ����� �����
// �� ��������� ������������ fix
var exp10=Math.pow(10,decimal);// �������� � ����������� ���������
r=Math.round(r*exp10)/exp10;// ��������� �� ������������ ����� ������ ����� �������

// ����������� � ��������, �������������� �������, ��� ��� � ������ ������ ������ �����
// ���� ������������� �� ���������, �� ���� ����� ����� ������
// ������������ 1.00, � �� 1
rr=Number(r).toFixed(decimal).toString().split('.');

// ��������� ������� � ������� ������, ���� ��� ����������
// �� ����, 1000 ���������� 1 000
b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
r=b+'.'+rr[1];

return r;// ���������� ���������
}// /sdf_FTS
// _____________________________________________________________________________