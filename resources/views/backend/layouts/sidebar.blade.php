



<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @if(Auth::user()->role=='Admin')

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
            </ul>
          </li>
          @endif



            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{route('profile.password.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Website
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('web-site.contact.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.link.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Links</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.notice.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.about.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.principal.message.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Principal Message</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.mission-vision.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mission Vision</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.slogan.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slogan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.slider.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('web-site.contactor.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contactors</p>
                </a>
              </li>
            </ul>
          </li>



           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Setup
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setups.student.class.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Class</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{route('setups.year.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Year</p>
                </a>
              </li>





              <li class="nav-item">
                <a href="{{route('setups.group.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Group</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('setups.shift.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Shift</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('setups.fee.category.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('setups.fee.amount.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category Amount</p>
                </a>
              </li>



               <li class="nav-item">
                <a href="{{route('setups.exam.type.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Type</p>
                </a>
              </li>





               <li class="nav-item">
                <a href="{{route('setups.subject.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject View</p>
                </a>
              </li>




              <li class="nav-item">
                <a href="{{route('setups.assign.subject.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Subject</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{route('setups.designation.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>

            </ul>


            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Student
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.registration.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Student Registration </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('students.roll.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Student Roll Generate </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('students.reg.fee.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Student Restration Fee </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('students.monthly.fee.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Monthly Fee </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('students.exam.fee.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Exam Fee </p>
                </a>
              </li>


            </ul>
          </li>




          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Employee
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employees.reg.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Employee Registration </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('employees.salary.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Employee Salary </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('employees.leave.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Employee Leave </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('employees.attendance.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Employee Attendance </p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{route('employees.monthly.salary.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Employee Monthly Salary </p>
                </a>
              </li>

             

            </ul>
          </li>






          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage mark
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marks.add')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Mark Entry </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('marks.edit')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Mark Edit </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('marks.grade.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Greate Point (GPA) </p>
                </a>
              </li>


             

             

            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Accounts Managment
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('accounts.fee.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Student Fee </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('accounts.salary.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Employee Salary </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('accounts.cost.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Other Cost </p>
                </a>
              </li>


             

             

            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Report Managment
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('reports.profit.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Monthly/Yearly Profit </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('reports.marksheet.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> MarkSheets </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('reports.attendance.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Attendence Report </p>
                </a>
              </li>


               <li class="nav-item">
                <a href="{{route('accounts.cost.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> All Student Results </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('reports.id.card.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> All Student ID Card </p>
                </a>
              </li>


              <!-- Created By Asadullah -->
              <li class="nav-item">
                <a href="{{route('reports.student.admission.view')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Student Admission </p>
                </a>
              </li>

             

            </ul>
          </li>









          </li>

        </ul>





      </nav>