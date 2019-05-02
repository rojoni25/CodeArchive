#include <stdio.h>
#include <math.h>
void main()
{
    int x,y,z,a,p;
        printf("Inter two digit number:");
        scanf("%d",&x);
y=x/10;
z=x%10;
a=y+z;
p=pow(y,z);
     if (y>z)
        printf("\n\n%d is large\n\n",y);
    else if(z<y)
        printf("\n\n%d is large\n\n",z);
    else
        printf("\n\n%d and %d are equal\n\n",y,z);
    printf("\n%d ^ %dis\t%d\n\n%d + %d is  %d\n\n",y,z,p,y,z,a);

}
