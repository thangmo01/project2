# Project2
  Project2 เป็นเว็บแอพพลิเคชั่นที่จัดทำขึ้นโดยมุ่งเน้นไปที่การศึกษาเบื้องหลังการทำงานของเว็บแอพพลิเคชั่น
#### feature
* เช็คชื่อการเข้าห้องเรียนของนักเรียนโดยใช้การจดจำใบหน้า (face recognition)
* แบ่งผู้ใช้ออกเป็น 2 หมวดคุณครูและนักเรียน โดยนักเรียนจำเป็นต้อง Upload รูปหน้าตนเองขึ้นไป และเมื่อถึงเวลาเรียนคุณครูจะทำการเปิดการเช็คชือในช่วงทดลองนั้นใช้เป็น webcamera ของคอมพิวเตอร์คุณครูไป
* คุณครูสามารถสร้างคลาสเรียนของตนเองเพื่อไว้เก็บสถิติการเข้าเรียนของนักเรียน โดยนักเรียนที่จะสามารถเข้าคลาสได้นั้นจำเป็นต้องมี key ของคลาสนั้นๆก่อน
* คุณครูสามารถเรียกดูสถิติการเข้าห้องเรียนของนักเรียนในเฉพาะคลาสที่ตนเองสร้างขึ้น

#### tech stack
* Web application
    * PHP เป็น MVC pattern(framework) ที่ผู้จัดทำสร้างขึ้น
* API service (แยกอกกเป็นอีก repository ตามไปดูได้ที่ https://github.com/thangmo01/project2-face-recognition)
    * python
    * Flask REST API
    * AWS S3 สำหรับเก็บรูปภาพ
    * AWS rekognition สำหรับการคัดแยกในหน้า
    * AWS EC2 สำหรับรัน service

#### contributors
* lookharm: https://github.com/thangmo01
* Failmaker: https://github.com/Failmaker
* PK: https://github.com/PK9856
* bigguu: https://github.com/bigguu
