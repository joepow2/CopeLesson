
//Define calendar(s): addCalendar ("Unique Calendar Name", "Window title", "Form element's name", Form name")
addCalendar("P_NextDate", "下次生效日期", "P_NextDate", "form1");
addCalendar("BR_ActiveDate", "生效日期", "BR_ActiveDate", "form1");
addCalendar("searchStart", "選擇日期", "searchStart", "form1");
addCalendar("searchEnd", "選擇日期", "searchEnd", "form1");
//addCalendar("Calendar2", "Select Date", "secondinput", "sampleform");

// default settings for English
// Uncomment desired lines and modify its values
// setFont("verdana", 9);
 setWidth(90, 1, 15, 1);
 setFormat("yyyy/mm/dd");
// setColor("#cccccc", "#cccccc", "#ffffff", "#ffffff", "#333333", "#cccccc", "#333333");
// setFontColor("#333333", "#333333", "#333333", "#ffffff", "#333333");
// setFormat("yyyy/mm/dd");
// setSize(200, 200, -200, 16);

// setWeekDay(0);
 setMonthNames("一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月");
 setDayNames("日", "一", "二", "三", "四", "五", "六");
 setLinkNames("[關閉]", "[清除]");
