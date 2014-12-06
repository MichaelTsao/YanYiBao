create table shows(
  id int primary key auto_increment,
  name varchar(100) comment '名字',
  start_date date comment '开始时间',
  end_date date comment '结束时间',
  place varchar(100) comment '地点',
  rate tinyint default 0 comment '评价',
  picture varchar(255) comment '配图',
  rate_men int default 0 comment '评价人数',
  type tinyint comment '类型',
  price varchar(100) comment '票价',
  background varchar(255) comment '背景图',
  guide_url varchar(255) comment '引导页',
  buy_url varchar(255) comment '购买页',
  ctime timestamp default current_timestamp comment '创建时间'
);

create table star(
  id int primary key auto_increment,
  name varchar(50) comment '名字',
  portrait varchar(255) comment '头像',
  ctime timestamp default current_timestamp comment '创建时间'
);

create table show_star(
  show_id int comment '节目',
  star_id int comment '明星',
  ctime timestamp default current_timestamp comment '创建时间'
);

create table picture(
  id int primary key auto_increment,
  type tinyint comment '类型', # show: gallery, program  star:pic
  owner_id int comment '所属',
  url varchar(255) comment '图片链接',
  ctime timestamp default current_timestamp comment '创建时间'
);

create table rate(
  id int primary key auto_increment,
  show_id int comment '节目',
  value tinyint comment '分数',
  words varchar(500) comment '评价文字',
  ctime timestamp default current_timestamp comment '创建时间'
);
