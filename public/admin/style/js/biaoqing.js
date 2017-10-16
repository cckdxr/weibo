var aImgs=new Object();
aImgs["[guanggao]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/ad_new0902_thumb.gif">'
aImgs["[doge]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/doge_thumb.gif">'
aImgs["[miaomiao]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/4a/mm_thumb.gif">'
aImgs["[erha]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/74/moren_hashiqi_thumb.png">'
aImgs["[xiaohuangrenjiandaoshou]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ed/xiaohuangren_jiandaoshou_thumb.png">'
aImgs["[xiaohuangren]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8d/xiaohuangren_gaoxing_thumb.png">'
aImgs["[xiaocry]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/34/xiaoku_thumb.gif">'
aImgs["[tanshou]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/09/pcmoren_tanshou_thumb.png">'
aImgs["[baobao]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/pcmoren_baobao_thumb.png">'
aImgs["[guille]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6c/pcmoren_guile_thumb.png">'
aImgs["[chigua]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8a/moren_chiguaqunzhong_thumb.png">'
aImgs["[duolachijing]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f0/dorachijing_thumb.gif">'
aImgs["[huaixiao]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_thumb.png">'
aImgs["[tianping]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_thumb.png">'
aImgs["[wu]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_thumb.png">'
aImgs["[yunbei]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/2c/moren_yunbei_thumb.png">'
aImgs["[xiaoerbuyu]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3a/moren_xiaoerbuyu_thumb.png">'
aImgs["[feijie]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/moren_feijie_thumb.png">'
aImgs["[chongjing]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/37/moren_chongjing_thumb.png">'
aImgs["[bingbujiandan]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/fc/moren_bbjdnew_thumb.png">'
aImgs["[weixiao]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/huanglianwx_thumb.gif">'
aImgs["[ku]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8a/pcmoren_cool2017_thumb.png">'
aImgs["[xixi]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif">'
aImgs["[haha]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6a/laugh.gif">'
aImgs["[keai]"]='<img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/14/tza_thumb.gif">'
function replace(s){
for (var p in aImgs)
{
    s = s.replace(p, aImgs[p]);
}
	return s;
}