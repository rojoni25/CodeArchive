#include <stdio.h>
void main()
{
    int a,b,c,sum;
    float Average;
    printf("1st number:");
    scanf("%d",&a);
    printf("2nd number:");
    scanf("%d",&b);
    printf("3rd number:");
    scanf("%d",&c);
    sum=a+b+c;
    Average= (float ) sum/3;
    printf("%.2f",Average);
}
