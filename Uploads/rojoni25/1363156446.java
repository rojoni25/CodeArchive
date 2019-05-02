/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package bank_interest;

import java.util.Scanner;

class BangladeshBank
{
   static String ClientName;
   static double Balance ;
    
    
    void showRateofInterest(String name,double amount)
    {
        
        ClientName=name;
        Balance=amount;
        double interest=0.10, cal;
        System.out.println(ClientName);
        System.out.println(Balance);
        
       cal=Balance*interest;
       cal=Balance+cal;
       System.out.println("Amount including interest in Bangladesh Bank = "+ cal);
    }
}
 class IslamicBank extends BangladeshBank
 {
        @Override
        void showRateofInterest(String name,double amount)
        {
             ClientName=name;
             Balance=amount;
            double interest=0.15, cal;
        
       cal=Balance*interest;
       cal=Balance+cal;
       super.showRateofInterest(name,amount);
       System.out.println("Amount including interest in Islamic Bank = "+ cal);
       
        }
                
 }
 
 class DuchBanglaBank extends BangladeshBank
 {
     @Override
        void showRateofInterest(String name,double amount)
        {
             ClientName=name;
             Balance=amount;
            double interest=0.20, cal;
        
       cal=Balance*interest;
       cal=Balance+cal;
       super.showRateofInterest(name,amount);
       System.out.println("Amount including interest in Duch Bangla Bank = "+ cal);
       
        }
 }

public class Bank_Interest {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       String Name;
       double amount;      
        IslamicBank ob1=new IslamicBank();        
        DuchBanglaBank ob2=new DuchBanglaBank();
        Scanner scn=new Scanner(System.in);
        Name=scn.nextLine();
        amount=scn.nextDouble();
        ob1.showRateofInterest(Name,amount);
        ob2.showRateofInterest(Name,amount);
    }
    
}
