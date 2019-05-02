#include<iostream>
using namespace std;


int fact(double a)
{
  double i,j=0,k=1;
  for(i=a;i>0;i--)
     k*=i;
  cout<<k<<"   ";
  return k;

}


int main()
{
    int a,i,j=0,k=1,n;
    cin>>a;
    for(i=a;i>0;i--)
    {
        if(i%2!=0)
        {
            fact(i);

        }
        else
            continue;

    }


}
