@extends("layouts.web")

<x-seo page="{{ 'car-loan' }}" />


@section('content')
<section class="car-loan header-height" id="car-loan">
   <h2 class="main-title">Car Loan Upto ₹ 50,00,000</h2>
   <div class="estimation-div">
      <p class="title fw-bold text-center">Select Your Loan Amount Requirement</p>
      <div class="amount-selector">
         <span class="start ">1,00,000</span>
         <div class="range">
            <label for="customRange2" class="form-label">Example range</label>
            <input type="range" class="form-range" min="50000" max="1000000" id="customRange2">
         </div>
         <span class="end ">50,00,000</span>
      </div>

      <table class="table ">
         <tr>
            <td>Tenure (months)</td>
            <td>Interest Rate (p.a)</td>
            <td>EMI (monthly)</td>
            <td>Total Repayment </td>
         </tr>
         <tr class="table table-bordered">
            <td class="border">72</td>
            <td class="border">10.5 %</td>
            <td class="border">939</td>
            <td class="border">67,608</td>
         </tr>
      </table>
      <button class="btn mx-auto d-block an-btn mb-2">Apply For Car Loan Now</button>

      <span class="small fw-bold ">T&C apply. The values shown are for representation purposes only. Actual values may differ.</span>
   </div>
</section>

<section class="tabs-page-scroll ">
   <div class="tabs-container">
      <ul class="list-unstyled">
         <li class="active"><a href="#tab1">Documents</a></li>
         <li class=""><a href="#tab2">Benefits </a></li>
         <li class=""><a href="#tab3">Features</a></li>
         <li class=""><a href="#tab4">Types</a></li>
      </ul>
   </div>
</section>

<section class="personal-loan-about " id="tab1">
   <h3 class="title text-center mb-5">Car Loan</h3>

   <p class="para">
      A car improves your social standing while reducing the difficulties and costs of travel. 
      Having a car was formerly considered to be a luxury but nowadays it is a need and convenience to 
      get around. You can't buy a car with all of your savings. Car loan is a sum of money that a 
      customer borrows to pay for a car and repay it by a specific date, commonly by making monthly 
      payments (annually computed). The loan is secured by the car you want to buy with it serving as 
      collateral for the loan. Several lenders can help you realise your dream of getting the car you've 
      always wanted by giving you a car loan, even though not everyone has the money to buy the car in 
      one-time payment. Another name for this kind of debt is financing. Banks and other financial 
      institutions provide these loans to assist consumers in purchasing the desired car for their 
      personal or professional use. 
   </p>
   <p class="para">Currently, obtaining a car loan from a bank is fairly easy, convenient and paperless. Today, almost all banks provide car loans with competitive interest rates. Online application can be submitted in just a few clicks. All car loans have defined terms that range in duration from 24 to 72 months but some car loans might be for longer terms. Similar to a personal loan, the monthly payment increases as the term extends and vice versa. Several fees and taxes are typically included in car loans and are added to the overall loan amount. You must pay back the balance of the car loan in simple monthly instalments without significantly impacting one’s finances. This turns into a win-win situation where you can behave wisely by getting the car of your dreams while also avoiding unnecessary debt. </p>
   
   <div class="row mx-auto container-fluid w-85 p-0 mt-5">
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Eligibility Requirements for a Car Loan:</h3>
         
         <p class="">
             Different banks may have varying requirements for becoming eligible for Car Loan. The requirements that must be fulfilled in order to qualify for a car loan:
         </p>
         <ol class="ul">
            <li>
              <p>
            A minimum age of 18 and a maximum age of 75 are required for applicants.
              </p>
            </li>
            <li>
              <p>
               Indian resident status is required.
              </p>
            </li>
            <li>
              <p>
                A self-employed or salaried individual who works for a public institution or a private firm is required.
              </p>
            </li>
            <li>
              <p>
               In the case of salaried person, working period of at least 1 year is required with the current employer.
              </p>
            </li>
            <li>
              <p>
               Credit Score of the person should be 700 or above
              </p>
            </li>
            <li>
              <p>
                A net monthly income of at least Rs. 20,000 is needed.
              </p>
            </li>
         </ol>
         
         <br />
      </div>
   </div>
  
   <div class="row mx-auto container-fluid w-85 p-0 mt-5">
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Documents Required for Car Loan:</h3>
         
         <p class="">
             Subsequent stage of documentation can be proceeded with if you are eligible to apply for a car loan. The following required documents must be provided in order for the banks or any other financial institution for the smooth processing of loan
         </p>
         <ol class="ul">
            <li>
              <p>
            Valid Age Proof to prove that applicant is at least 18 years old, it can be a birth certificate, driver's licence, passport, ration card, or any other official document that includes the age.
              </p>
            </li>
            <li>
              <p>
               Your most recent passport-size photo in three copies..
              </p>
            </li>
            <li>
              <p>
                Application Form duly filled out and signed.
              </p>
            </li>
            <li>
              <p>
                Income Proof Salaried Individuals must provide their most recent six months of pay slips, their last three months' bank statements, Form-16, and an updated ITR, while Self-employed person must provide their most recent three months' bank statements, Balance Sheets, P&L accounts, ITRs, and other documents. 
              </p>
            </li>
         </ol>
         
         <br />
      </div>
   </div>
  
  
   <div class="row mx-auto container-fluid w-85 p-0 mt-5">
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Application and Approval Process for Car Loans:</h3>
         
         <p class="">
         You can apply for a car loan both online and offline but it is more simple and convenient to apply it online. Simply go to the bank's website and submit your application there, or submit it via a credible third-party website. Following are the procedures that are required for submitting an application and receiving approval for a car loan:
         </p>
         <ol class="ul">
            <li>
              <p>
                  <b>Evaluate Your CIBIL Score:</b>
            Evaluate your credit report first because banks give loans to applicants with strong credit. A credit score is a vital element when applying for a car loan.
              </p>
            </li>
           
            <li>
              <p>
                  <b>Submit the application:</b>
            Submit your loan application to the specified bank together with all required supporting documentation. Make sure the form is properly completed including all relevant supporting documentation.
              </p>
            </li>
           
            <li>
              <p>
                  <b>Verification of application:</b>
            To determine your eligibility, the bank will examine your profile, credit score, and documents to make sure they are accurate. If your eligibility is confirmed, your loan application will be approved.
              </p>
            </li>
           
            <li>
              <p>
                  <b>Approval of Loan:</b>
           A car loan is approved by banks in 1 to 5 days. However, based on the person's profile, this time frame may differ from bank to bank.
              </p>
            </li>
            <li>
              <p>
                  <b>Loan Disbursement:</b>
           After the loan has been approved, the money will either be deposited into your account or given directly to the car dealer where you will be purchasing the vehicle.
              </p>
            </li>
            
         </ol>
         
         <br />
      </div>
   </div>
   

</section>

<section class="benefits-loan " id="tab2">
   <div class="row mx-auto container-fluid container-md">
      <div class="col-md-8">
         <h3 class="title theme-orange">Factors to be Considered for Car Loan</h3>
         <p class="para">It is crucial to understand the fundamentals of car financing before applying for a car loan for the first time.
         </p>
         <ul class="ul">
            <li>Knowing your budget clearly can assist you in deciding the type of car you can buy. While applying for a car loan, you should consider the fees you'll have to pay such as those for maintenance and registration.</li>
            
            <li>Choose the lender to whom you will submit your car loan application after doing some market research on the rates, fees, and other terms and conditions provided by various banks and lenders. Similarly, request quotes for your desired vehicle from many dealers. Some of the dealers can have collaboration with the banks to provide the vehicle at a lower cost.</li>
            
            <li>Getting your vehicle loan approved will make the process quicker and more flexible right before you're ready to look for the car of your choice.</li>
            <li>Determine the monthly instalment amount that will be used to pay back the money, taking into account your budget. Calculate your interest rate, the term of the loan and the amount to be repaid in EMIs using the vehicle loan calculator if necessary. With the help of this research, you can confidently negotiate with the bank representative about the loan repayment period and EMI details.</li>
            <li>Choose the appropriate time for buying a car particularly during Indian holidays like Dussehra and Diwali, as the majority of lenders provide low interest rates, processing fee waivers, special promotions and discounts during these times. There may be numerous additional occasions on which lenders or vehicle dealer present deals and discounts. Sometimes, 0% financing alternatives are also available </li>
            <li>After you are ready to shop for the car of your choice, the last step is to go for purchasing the car. Do your research in advance to determine which car will meet your demands and be the greatest choice for you in your budget.</li>
         </ul>
      </div>
      <div class="col-md-4">
         <div class="img-container" style="overflow: hidden;">
            <img src="{{ asset('web/image')}}/personal-loan.jpg" alt="" height="400px" width="auto">
         </div>
      </div>
   </div>
</section>

<section class="types-loan pt-5" id="tab3">
   <div class="row mx-auto container-fluid container-md">
      <div class="col-md-12">
         <h3 class="title theme-orange">Advantages and Features of Car Loan:</h3>
         <p>The following features and advantages are generally available with car loans in India. This may vary depending upon the lenders target customers. Some of the key features of the car loan are as follows:</p>
        <ul>
            <li>
                <p>
                  The loan amount might range from 85% to 90% of the vehicle's on-road cost. Under certain conditions, some banks will finance up to 100% of the vehicle's on-road price.
                </p>
            </li>
            <li>
                <p>
                  	Car loans are secured loans, means until the full amount of the loan is repaid and the vehicle you acquired serves as collateral with the lender. Lenders often charge a lower interest rate on these loans because of its secured nature.
                </p>
            </li>
            <li>
                <p>
                  Car loans aren't just for brand-new vehicles. A used car loan will allows you to buy a used car.
                </p>
            </li>
            <li>
                <p>
                  Monthly instalments are the method of payments that is most commonly used for car loans (EMI). Depending on the type of vehicle loan you needed, the repayment period may vary between a year and 84 months.
                </p>
            </li>
            <li>
                <p>
                  If you decide to purchase a car from the dealer or manufacturer the bank has a contract with, you might be eligible for additional discounts and offers.
                </p>
            </li>
           
        </ul>
      </div>
   </div>
   
   <div class="row mx-auto container-fluid w-85 p-0 mt-5">
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Factors Affecting Car Loan:</h3>
         
         <ol class="ul">
            <li>
              <p>
                  <b>CIBIL Score:</b>
           To determine creditworthiness, your lender will check your CIBIL score. The lender will decide the amount of credit they are willing to provide you and the terms and conditions related to it based on your report and score.
              </p>
            </li>
           
            <li>
              <p>
                  <b>Debt to Income proportion:</b>
            By looking at your debt-to-income (DTI), the lender can decide whether you can afford a new loan and repay it. Lenders determine whether its EMIs fit in your budget by looking at your income and the obligations you have to meet at the end of the month. Depending on the same there is a chance that your loan conditions will be restrictive.
              </p>
            </li>
           
            <li>
              <p>
                  <b>Down Payment:</b>
           Every auto loan has a specified margin means the amount of money or the portion of the on-road car price that you have to pay at the time of purchase itself. In fact, there are lenders with 100% financing on the market subject to some restrictions. It is also preferred by lenders to contribute a specific amount as a down payment. This gives the lenders some assurance that you manage your money wisely, and won't suddenly stop making payments.
              </p>
            </li>
            <li>
              <p>
                  <b>Used Vehicle’s Age:</b>
           The age of the vehicle is a major consideration when determining the interest rate for used car loans; it also determines whether to approve or reject the loan application.
              </p>
            </li>
            
         </ol>
         
         <br />
      </div>
   </div>
</section>

<section class="types-loan pt-5" id="tab4">
  
   <div class="row mx-auto container-fluid w-85 p-0 mt-5">
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Types of Car Loan:</h3>
         <p>In India, there are three distinct categories of car loans which are as follows:</p>
         <ol class="ul">
            <li>
              <p>
                  <b>New Car Loan:</b>
           A new car loan allows you to buy a brand-new car directly out of the showroom. For a loan term of 1 to 7 years, banks offer new car loans at an interest rate of 9-14% p.a. The majority of manufacturers and models of new cars currently 
available in the market are eligible for loans.

              </p>
            </li>

            <li>
              <p>
                  <b>Used Car Loan:</b>
          Even with a loan, not everyone can afford to purchase a new car. Most lenders will finance 85% of the cost of the vehicle. You'll have to pay 12–18% interest per year. Repayment period of loan will be 1-5 years.  To qualify for a loan for a previously owned car, the car must be less than five years old and cannot be more than ten years old when the loan is due.
              </p>
            </li>
            <li>
              <p>
                  <b>Loan for Commercial Car:</b>
          A business entity or an individual who runs a company that needs cars may choose to take out a commercial vehicle loan. You will have to pay an annual interest rate of 10-15% on this type of loan over a period of anywhere from six months to five years. Your business's yearly revenue and the number of vehicles you currently own will determine the size of the loan you can borrow.
              </p>
            </li>
            
         </ol>
         
         <br />
      </div>
   </div>
   
   
   <div class="row mx-auto container-fluid w-85 p-0 mt-5">
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Foreclosure of Car Loan</h3>
         <p>When you take out a car loan, you can pay it off over time in equated monthly installments (EMIs). But, you will be prepaying or foreclose your loan if you decide to pay off the outstanding balance before the term is over. Although certain lenders may let you foreclose or prepay your car loan without imposing any penalties, the majority of lenders offer the foreclosure/prepayment option for a penalty fee.</p>
         <p>If your income has increased and you want to discharge your obligation, you can foreclose your car loan. Also, it relieves you of the pressure of monthly EMI payments. When a car loan is paid off in full, the hypothecation on the vehicle is discharged.</p>
      </div>
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Top-Up Loan on Car Loan</h3>
         <p>You can obtain a top-up loan on your existing car loan if you need urgent cash or additional funds after taking out a car loan for events like a wedding, house renovations, unexpected medical expenses, etc. With a top-up loan, you are eligible for up to 150% of the car's value. The majority of lenders who offer top-ups on car loans will require that you keep up a flawless payment history for at least nine months. It takes little time and paperwork to get a top-up loan for your current car loan.</p>
      </div>
      <div class="col-md-12 p-0">
         <h3 class="title theme-orange">Car Re-financing</h3>
         <p>Car refinancing is the process of taking out a new loan to pay off the outstanding debt on an existing car loan. If you want to replace your current loan with a better one that has superior characteristics like low interest rates, longer payback terms, etc. or if you just want to modify the conditions of your present loan, you can refinance your car loan. Saving money is the primary motivation for refinancing car loans. You can obtain a new loan with reduced interest rates when you refinance a car loan, which will enable you to save money. By car refinancing, you can also reduce the equated monthly instalments (EMIs) by selecting a longer repayment period with a new lender.</p>
         
         <p>When interest rates have decreased since you took out the initial car loan, your financial situation has improved, you are unable to pay high EMIs, and you believe you did not get a fair deal on your car loan the first time around, refinancing is a good decision. Refinancing a car loan, however, is not a good idea if you have already paid off a significant portion of your original loan, your car's value has decreased, the prepayment penalties are high, and you intend to apply for additional loans in the future because refinancing could affect your credit score.</p>
      </div>
   </div>
</section>

<!----------- testimonial section  ----------->
@include('layouts.incl.testimonial')

<!---------- FAQs section ------------>
@include('layouts.incl.faq')

@endsection